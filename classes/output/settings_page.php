<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle. If not, see <http://www.gnu.org/licenses/>.

/**
 * Defines the settings page for the plugin.
 *
 * @package local_openveo_api
 * @copyright 2018 Veo-labs
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_openveo_api\output;

defined('MOODLE_INTERNAL') || die();

use renderable;
use templatable;
use renderer_base;
use stdClass;
use context_system;
use Openveo\Client\Client;
use Openveo\Exception\ClientException;
use Openveo\Exception\RestClientException;
use local_openveo_api\event\connection_failed;

/**
 * Defines the plugin settings page.
 *
 * The settings page holds a formular to configure access to OpenVeo web service and is capabable of testing the
 * connection at load.
 *
 * @package local_openveo_api
 * @copyright 2018 Veo-labs
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class settings_page implements renderable, templatable {

    /**
     * The settings form.
     *
     * @var settings_form
     */
    protected $form;

    /**
     * The translated title of the page.
     *
     * @var string
     */
    protected $pagetitle;

    /**
     * The error message if connection test failed.
     *
     * @var string
     */
    protected $connectionerrormessage;

    /**
     * Creates a settings_page holding settings of OpenVeo API.
     *
     * It also tests connection to the OpenVeo web service with new data if formular is submitted or with actual
     * configuration if not. Connection test doesn't block user from storing the configuration as the OpenVeo server
     * might not be available right now or might not be setup yet.
     *
     * @param string $pagetitle The translated page title
     */
    public function __construct($pagetitle) {
        $this->pagetitle = $pagetitle;
        $defaults = array(
            'settingscdnurl' => get_config('openveo_api', 'settingscdnurl'),
            'settingswebserviceurl' => get_config('openveo_api', 'settingswebserviceurl'),
            'settingswebserviceclientid' => get_config('openveo_api', 'settingswebserviceclientid'),
            'settingswebserviceclientsecret' => get_config('openveo_api', 'settingswebserviceclientsecret'),
            'settingswebservicecertificatefilepath' => get_config(
                    'openveo_api',
                    'settingswebservicecertificatefilepath'
            )
        );
        $this->form = new settings_form(null, $defaults);

        $data = $this->form->get_data();
        if (isset($data)) {

            // Formular has been submitted and is validated.
            // Test connection with information from the formular.
            $this->connectionerrormessage = $this->test_connection_to_openveo(
                    $data->settingswebserviceurl,
                    $data->settingswebserviceclientid,
                    $data->settingswebserviceclientsecret,
                    $data->settingswebservicecertificatefilepath
            );

            // Save configuration to database.
            set_config('settingscdnurl', $data->settingscdnurl, 'openveo_api');
            set_config('settingswebserviceurl', $data->settingswebserviceurl, 'openveo_api');
            set_config('settingswebserviceclientid', $data->settingswebserviceclientid, 'openveo_api');
            set_config('settingswebserviceclientsecret', $data->settingswebserviceclientsecret, 'openveo_api');
            set_config(
                    'settingswebservicecertificatefilepath',
                    $data->settingswebservicecertificatefilepath,
                    'openveo_api'
            );

        } else {

            // Formular has not been submitted.
            // Test connection with actual configuration.
            $this->connectionerrormessage = $this->test_connection_to_openveo(
                    $defaults['settingswebserviceurl'],
                    $defaults['settingswebserviceclientid'],
                    $defaults['settingswebserviceclientsecret'],
                    $defaults['settingswebservicecertificatefilepath']
            );

        }
    }

    /**
     * Exports page data to be exposed to the template.
     *
     * @see templatable
     * @param renderer_base $output Used to do a final render of any components that need to be rendered for export
     * @return stdClass Data to expose to the template
     */
    public function export_for_template(renderer_base $output) {
        $data = new stdClass();
        $data->title = $this->pagetitle;
        $data->form = $this->form->render();

        $message = get_string('settingswebservicesuccess', 'local_openveo_api');
        $status = 'success';
        if (isset($this->connectionerrormessage)) {
            $message = $this->connectionerrormessage;
            $status = 'error';
        }

        $data->connectionmessage = $output->notification($message, $status);
        return $data;
    }

    /**
     * Triggers a local_openveo_api\event\connection_failed event with the given message.
     *
     * @param string $message The error message to send along with the event
     */
    private function send_connection_failed_event($message) {
        $event = connection_failed::create(array(
            'context' => context_system::instance(),
            'other' => array(
                'message' => $message
            )
        ));
        $event->trigger();
    }

    /**
     * Tests if it is possible to connect to OpenVeo web service using information from settings form.
     *
     * @param string $url The web service full URL (with port if necessary)
     * @param string $clientid The Moodle client id in front of OpenVeo web service
     * @param string $clientsecret The Moodle client secret associated to the client id
     * @param string $certificatefilepath The absolute path to the OpenVeo web service certificate file if necessary
     * @return string|null An error message if connection failed, null otherwise
     */
    private function test_connection_to_openveo($url, $clientid, $clientsecret, $certificatefilepath = null) {
        try {
            $client = new Client(
                    $url,
                    $clientid,
                    $clientsecret,
                    $certificatefilepath
            );
            $client->authenticate();
        } catch (ClientException $e) {

            // Authentication has failed.
            // Trigger an event informing that connection to OpenVeo web service has failed.
            $this->send_connection_failed_event($e->getMessage());

            return get_string('settingswebservicecredentialserror', 'local_openveo_api');
        } catch (RestClientException $e) {

            // Can't reach the server.
            // Trigger an event informing that connection to OpenVeo web service has failed.
            $this->send_connection_failed_event($e->getMessage());

            // Problem with the certificate if error message contains "CAfile"
            if (strpos($e->getMessage(), 'CAfile') !== false) {
                return get_string('settingswebservicecertificateerror', 'local_openveo_api');
            } else {
                return get_string('settingswebservicecommunicationerror', 'local_openveo_api');
            }
        }
    }

}

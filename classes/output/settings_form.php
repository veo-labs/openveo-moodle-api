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
 * Defines the settings form associated to the settings page.
 *
 * @package local_openveo_api
 * @copyright 2018 Veo-labs
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_openveo_api\output;

defined('MOODLE_INTERNAL') || die();

use moodleform;

/**
 * Defines the settings form.
 *
 * Settings form configures access to OpenVeo web service.
 *
 * @package local_openveo_api
 * @copyright 2018 Veo-labs
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class settings_form extends moodleform {

    /**
     * Builds the formular.
     *
     * Formular is an HTML_QuickForm instance from Pear library {@link https://pear.php.net} while added elements
     * are instances of HTML_QuickForm_element. You might want to refer to Pear documentation if Moodle
     * documentation on forms is not enough.
     */
    public function definition() {

        // Regexp to validate URLs. This one is based on Sephen Hay regular expression but without the match of ftp
        // URLs.
        $urlregexp = '/^(https?):\/\/[^\s\/$.?#].[^\s]*$/';

        // CDN fieldset with description.
        $this->_form->addElement('header', 'settingscdn', get_string('settingscdnheader', 'local_openveo_api'));
        $this->_form->addElement('html', get_string('settingscdnheaderdescription', 'local_openveo_api'));

        // CDN URL.
        // PARAM_URL validates that the URL has a domain part however CDN URL might not have a domain part if
        // OpenVeo server has no associated domain name, that's why we use PARAM_RAW_TRIMMED here instead of
        // PARAM_URL.
        $this->_form->addElement(
                'text',
                'cdnurl',
                get_string('settingscdnurllabel', 'local_openveo_api'),
                array('size' => 30)
        );
        $this->_form->setType('cdnurl', PARAM_RAW_TRIMMED);
        $this->_form->addHelpButton('cdnurl', 'settingscdnurl', 'local_openveo_api');
        $this->_form->addRule('cdnurl', null, 'required', null, 'client');
        $this->_form->addRule(
                'cdnurl',
                get_string('settingscdnurlformaterror', 'local_openveo_api'),
                'regex',
                $urlregexp,
                'client'
        );
        if (!empty($this->_customdata['cdnurl'])) {
            $this->_form->setDefault('cdnurl', $this->_customdata['cdnurl']);
        }

        // Web service fieldset with description.
        $this->_form->addElement(
                'header',
                'webservice',
                get_string('settingswebserviceheader', 'local_openveo_api')
        );
        $this->_form->addElement('html', get_string('settingswebserviceheaderdescription', 'local_openveo_api'));

        // Web service URL.
        // PARAM_URL validates that the URL has a domain part however web service URL might not have a domain part
        // if OpenVeo web service server has no associated domain name, that's why we use PARAM_RAW_TRIMMED here
        // instead of PARAM_URL.
        $this->_form->addElement(
                'text',
                'webserviceurl',
                get_string('settingswebserviceurllabel', 'local_openveo_api'),
                array('size' => 30)
        );
        $this->_form->setType('webserviceurl', PARAM_RAW_TRIMMED);
        $this->_form->addHelpButton('webserviceurl', 'settingswebserviceurl', 'local_openveo_api');
        $this->_form->addRule('webserviceurl', null, 'required', null, 'client');
        $this->_form->addRule(
                'webserviceurl',
                get_string('settingswebserviceurlformaterror', 'local_openveo_api'),
                'regex',
                $urlregexp,
                'client'
        );
        if (!empty($this->_customdata['webserviceurl'])) {
            $this->_form->setDefault('webserviceurl', $this->_customdata['webserviceurl']);
        }

        // Web service server certificate file path.
        // A simple validation is made on the file path to validate windows and linux paths, no special character is
        // allowed instead of dashes, dots and underscores.
        $this->_form->addElement(
                'text',
                'webservicecertificatefilepath',
                get_string('settingswebservicecertificatefilepathlabel', 'local_openveo_api'),
                array('size' => 30)
        );
        $this->_form->setType('webservicecertificatefilepath', PARAM_RAW_TRIMMED);
        $this->_form->addHelpButton(
                'webservicecertificatefilepath',
                'settingswebservicecertificatefilepath',
                'local_openveo_api'
        );
        $this->_form->addRule(
                'webservicecertificatefilepath',
                get_string('settingswebservicecertificatefilepathformaterror', 'local_openveo_api'),
                'regex',
                '/^(?:[a-zA-Z]{1}:(?:\\\[A-Za-z0-9_\-.]+)+)$|^(?:(?:\/[A-Za-z0-9_\-.]+)+)$/',
                'client'
        );
        if (!empty($this->_customdata['webservicecertificatefilepath'])) {
            $this->_form->setDefault(
                    'webservicecertificatefilepath',
                    $this->_customdata['webservicecertificatefilepath']
            );
        }

        // Web service client id.
        $this->_form->addElement(
                'text',
                'webserviceclientid',
                get_string('settingswebserviceclientidlabel', 'local_openveo_api'),
                array('size' => 30)
        );
        $this->_form->setType('webserviceclientid', PARAM_ALPHANUMEXT);
        $this->_form->addHelpButton('webserviceclientid', 'settingswebserviceclientid', 'local_openveo_api');
        $this->_form->addRule('webserviceclientid', null, 'required', null, 'client');
        if (!empty($this->_customdata['webserviceclientid'])) {
            $this->_form->setDefault(
                    'webserviceclientid',
                    $this->_customdata['webserviceclientid']
            );
        }

        // Web service client secret.
        $this->_form->addElement(
                'text',
                'webserviceclientsecret',
                get_string('settingswebserviceclientsecretlabel', 'local_openveo_api'),
                array('size' => 30)
        );
        $this->_form->setType('webserviceclientsecret', PARAM_ALPHANUMEXT);
        $this->_form->addHelpButton(
                'webserviceclientsecret',
                'settingswebserviceclientsecret',
                'local_openveo_api'
        );
        $this->_form->addRule('webserviceclientsecret', null, 'required', null, 'client');
        if (!empty($this->_customdata['webserviceclientsecret'])) {
            $this->_form->setDefault(
                    'webserviceclientsecret',
                    $this->_customdata['webserviceclientsecret']
            );
        }

        $this->add_action_buttons(false, get_string('settingssubmitlabel', 'local_openveo_api'));
    }

}

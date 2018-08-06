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
 * Defines an event warning about a connection failure when trying to communicate with OpenVeo.
 *
 * @package local_openveo_api
 * @copyright 2018 Veo-labs
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_openveo_api\event;

defined('MOODLE_INTERNAL') || die();

use core\event\base;
use moodle_url;

/**
 * Defines the event triggered if connection to OpenVeo web service failed.
 *
 * @package local_openveo_api
 * @copyright 2018 Veo-labs
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class connection_failed extends base {

    /**
     * Initializes event static datas.
     *
     * Indicates that the event is related to a read operation and has no education level.
     */
    protected function init() {
        $this->data['crud'] = 'r';
        $this->data['edulevel'] = self::LEVEL_OTHER;
    }

    /**
     * Gets a human readable name for the event.
     *
     * @return string The event localized name
     */
    public static function get_name() {
        return get_string('eventconnectionfailed', 'local_openveo_api');
    }

    /**
     * Returns non-localised description of what happened.
     *
     * @return string The description of what happened
     */
    public function get_description() {
        return "Failed to connect to OpenVeo web service with message: \"{$this->other['message']}\".";
    }

    /**
     * Gets event relevant URL.
     *
     * @return moodle_url
     */
    public function get_url() {
        global $CFG;
        return new moodle_url("{$CFG->wwwroot}/local/openveo_api/openveo_settings.php");
    }

}

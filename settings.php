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
 * Defines a new administration page to configure communication with OpenVeo.
 *
 * Settings page is an external page because we want to verify the communication between Moodle and OpenVeo. Moodle
 * default admin pages don't offer enough control to do it.
 *
 * @package local_openveo_api
 * @copyright 2018 Veo-labs
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Ensure current user has "moodle/site:config" capability on system context.
if ($hassiteconfig) {

    // Create the settings page.
    // In a local plugin $settings is not defined.
    $settingspage = new admin_externalpage(
            'local_openveo_api',
            get_string('settingstitle', 'local_openveo_api'),
            "$CFG->wwwroot/local/openveo_api/openveo_settings.php"
    );

    // Add the page to the admin tree (admin_root class) in 'localplugins' category
    $ADMIN->add('localplugins', $settingspage);

}

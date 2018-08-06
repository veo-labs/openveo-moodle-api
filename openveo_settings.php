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
 * External administration page to configure communication with OpenVeo web service.
 *
 * @package local_openveo_api
 * @copyright 2018 Veo-labs
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require('../../config.php');
require_once($CFG->libdir . '/adminlib.php');

use local_openveo_api\output\settings_page;

// Initialize the settings page (layout, context, URL, page title, site name), verify that user is logged in and
// has enough permission and set settings page as active in the admin tree.
admin_externalpage_setup('local_openveo_api');

$page = new settings_page(get_string('settingstitle', 'local_openveo_api'));
$renderer = $PAGE->get_renderer('local_openveo_api');
echo $renderer->header();
echo $renderer->render($page);
echo $renderer->footer();

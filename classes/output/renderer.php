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
 * Defines the renderer for the plugin.
 *
 * For the sake of organization we use Moodle autoloader and namespaces instead of using the renderer.php file at
 * the plugin root, but this is the same.
 *
 * @package local_openveo_api
 * @copyright 2018 Veo-labs
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_openveo_api\output;

defined('MOODLE_INTERNAL') || die();

use plugin_renderer_base;

/**
 * Defines the plugin renderer.
 *
 * @package local_openveo_api
 * @copyright 2018 Veo-labs
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class renderer extends plugin_renderer_base {

    /**
     * Renders the settings page using template engine.
     *
     * @param settings_page $page The settings page
     * @return string The computed HTML of the settings page
     */
    public function render_settings_page(settings_page $page) : string {
        $data = $page->export_for_template($this);
        return parent::render_from_template('local_openveo_api/settings_page', $data);
    }

}

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
 * Exposes OpenVeo REST client library.
 *
 * For OpenVeo REST client library usage have a look at {@link https://github.com/veo-labs/openveo-rest-php-client}.
 *
 * @package local_openveo_api
 * @copyright 2018 Veo-labs
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Expose OpenVeo REST client library by adding library autoloader.
$libautoloadfilepath = 'lib/openveo-rest-php-client/autoload_dist.php';
if (file_exists(__DIR__ . '/' . $libautoloadfilepath)) {
    require_once($libautoloadfilepath);
} else {
    throw new moodle_exception('OpenVeo REST Client not installed');
}

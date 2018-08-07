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
 * Defines english translations.
 *
 * @package local_openveo_api
 * @copyright 2018 Veo-labs
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Plugin name
$string['pluginname'] = 'OpenVeo API';

// Settings page
$string['settingstitle'] = 'OpenVeo API settings';
$string['settingssubmitlabel'] = 'Save changes';

// Settings page: Content Delivery Network configuration form.
$string['settingscdnheader'] = 'CDN';
$string['settingscdnheaderdescription'] = 'Moodle may need public resources from OpenVeo like videos or images. These resources are delivered by OpenVeo CDN (<b>C</b>ontent <b>D</b>elivery <b>N</b>etwork).';
$string['settingscdnurllabel'] = 'CDN URL';
$string['settingscdnurl'] = 'CDN URL';
$string['settingscdnurl_help'] = 'OpenVeo Content Delivery Network URL (e.g. https://openveo.local). Usually the URL of OpenVeo.';
$string['settingscdnurlformaterror'] = 'Invalid URL (e.g. https://openveo.local).';

// Settings page: Web service configuration form.
$string['settingswebserviceheader'] = 'Web service';
$string['settingswebserviceheaderdescription'] = 'Configure access to the OpenVeo web service. OpenVeo web service can be used to manage videos holded by OpenVeo. All fields must be populated. If you haven\'t all the information to complete the form, please contact the OpenVeo administrator.';
$string['settingswebserviceurllabel'] = 'Web service server URL';
$string['settingswebserviceurl'] = 'Web service server URL';
$string['settingswebserviceurl_help'] = 'The OpenVeo web service HTTP(S) server URL (e.g. https://openveo.local:1443)';
$string['settingswebserviceurlformaterror'] = 'Invalid URL (e.g. https://openveo.local:1443)';
$string['settingswebservicecertificatefilepathlabel'] = 'OpenVeo web service certificate';
$string['settingswebservicecertificatefilepath'] = 'OpenVeo web service certificate';
$string['settingswebservicecertificatefilepath_help'] = 'The OpenVeo web service certificate absolute path if HTTPS (e.g. /etc/ssl/certs/openveo-ws.pem).';
$string['settingswebservicecertificatefilepathformaterror'] = 'Invalid file path (e.g. /etc/ssl/certs/openveo-ws.pem).';
$string['settingswebserviceclientidlabel'] = 'Client id';
$string['settingswebserviceclientid'] = 'Client id';
$string['settingswebserviceclientid_help'] = 'Moodle client id to access OpenVeo web service (e.g Hk_EPX1BQ). An OpenVeo client can be retrieved from an OpenVeo administrator.';
$string['settingswebserviceclientsecretlabel'] = 'Client secret';
$string['settingswebserviceclientsecret'] = 'Client secret';
$string['settingswebserviceclientsecret_help'] = 'Moodle client secret to access OpenVeo web service (e.g 128f5fd5d980fa7f261bc1592f7f3a44c0e5fc42). An OpenVeo client can be retrieved from an OpenVeo administrator.';

// Settings page: Test connection messages
$string['settingswebservicecredentialserror'] = 'Authentication to OpenVeo web service failed when trying to connect with actual configuration. Wrong credentials.';
$string['settingswebservicecommunicationerror'] = 'Can\'t reach OpenVeo web service with actual configuration. Is the URL correct? Is OpenVeo web service server running?';
$string['settingswebservicecertificateerror'] = 'Can\'t reach OpenVeo web service with actual configuration. Is the certificate path correct?';
$string['settingswebservicesuccess'] = 'The test to connect to OpenVeo web service with actual configuration has succeeded.';

// Events
$string['eventconnectionfailed'] = 'OpenVeo connection failed';

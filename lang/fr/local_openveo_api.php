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
 * Defines french translations.
 *
 * @package local_openveo_api
 * @copyright 2018 Veo-labs
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Plugin name.
$string['pluginname'] = 'OpenVeo API';

// Settings page: Title.
$string['settingstitle'] = 'OpenVeo API configuration';
$string['settingssubmitlabel'] = 'Enregistrer les modifications';

// Settings page: Content Delivery Network configuration form.
$string['settingscdnheader'] = 'CDN';
$string['settingscdnheaderdescription'] = 'Moodle peut nécessiter des ressources en provenance d\'OpenVeo, comme des vidéos ou des images. Ces ressources sont délivrées par le CDN (<b>C</b>ontent <b>D</b>elivery <b>N</b>etwork) d\'OpenVeo.';
$string['settingscdnurllabel'] = 'URL du CDN';
$string['settingscdnurl'] = 'URL du CDN';
$string['settingscdnurl_help'] = 'URL du CDN (<b>C</b>ontent <b>D</b>elivery <b>N</b>etwork) d\'OpenVeo (ex : https://openveo.local). Habituellement l\'URL d\'OpenVeo.';
$string['settingscdnurlformaterror'] = 'URL invalide (ex : https://openveo.local).';

// Settings page: Web service configuration form.
$string['settingswebserviceheader'] = 'Web service';
$string['settingswebserviceheaderdescription'] = 'Configurer l\'accès au web service OpenVeo. Le web service OpenVeo peut être utilisé pour gérer les vidéos d\'OpenVeo. Tous les champs doivent être renseignés. Si vous n\'avez pas toutes les informations nécessaires pour remplir le formulaire, merci de contacter l\'administrateur d\'OpenVeo.';
$string['settingswebserviceurllabel'] = 'URL du web service';
$string['settingswebserviceurl'] = 'URL du web service';
$string['settingswebserviceurl_help'] = 'L\'URL du web service HTTP(S) d\'OpenVeo (ex : https://openveo.local:1443).';
$string['settingswebserviceurlformaterror'] = 'URL invalide (ex : https://openveo.local:1443).';
$string['settingswebservicecertificatefilepathlabel'] = 'Certificat du web service OpenVeo';
$string['settingswebservicecertificatefilepath'] = 'Certificat du web service OpenVeo';
$string['settingswebservicecertificatefilepath_help'] = 'Chemin absolu du certificat web service OpenVeo si HTTPS (ex : /etc/ssl/certs/openveo-ws.pem).';
$string['settingswebservicecertificatefilepathformaterror'] = 'Chemin invalide (ex : /etc/ssl/certs/openveo-ws.pem).';
$string['settingswebserviceclientidlabel'] = 'Identifiant client';
$string['settingswebserviceclientid'] = 'Identifiant client';
$string['settingswebserviceclientid_help'] = 'Identifiant client Moodle pour accéder au web service OpenVeo (ex : Hk_EPX1BQ). Un client OpenVeo peut être récupéré auprès d\'un administrateur OpenVeo.';
$string['settingswebserviceclientsecretlabel'] = 'Secret client';
$string['settingswebserviceclientsecret'] = 'Secret client';
$string['settingswebserviceclientsecret_help'] = 'Secret du client Moodle pour accéder au web service OpenVeo (ex : 128f5fd5d980fa7f261bc1592f7f3a44c0e5fc42). Un client OpenVeo peut être récupéré auprès d\'un administrateur OpenVeo.';

// Settings page: Notifications.
$string['settingswebservicecredentialserror'] = 'L\'authentification au web service OpenVeo a échoué avec la configuration actuelle. Mauvais identifiant et / ou secret.';
$string['settingswebservicecommunicationerror'] = 'La connexion au web service OpenVeo a échoué avec la configuration actuelle. L\'URL est-elle correcte ? Le web service OpenVeo est-il démarré ?';
$string['settingswebservicecertificateerror'] = 'La connexion au web service OpenVeo a échoué avec la configuration actuelle. Le chemin vers le certificat est-il correct ?';
$string['settingswebservicesuccess'] = 'Le test de connexion à OpenVeo a réussi avec la configuration actuelle.';

// Events.
$string['eventconnectionfailed'] = 'Connexion OpenVeo échouée';

// Privacy (GDPR).
$string['privacy:metadata'] = 'Le plugin local OpenVeo API n\'enregistre ni ne transmet de données personnelles.';

# OpenVeo Moodle API

OpenVeo Moodle API is a Moodle local plugin which exposes the [OpenVeo REST PHP client](https://github.com/veo-labs/openveo-rest-php-client), to other Moodle plugins, to communicate with [Openveo](https://github.com/veo-labs/openveo-core) web service.

# Getting Started

## Prerequisites

- PHP >=7
- Openveo >=5.1.1
- Moodle version >=3.4.0

## Installation

OpenVeo Moodle API does not embed OpenVeo REST PHP client which must be manually installed.

- Download zip file corresponding to the latest stable version of the OpenVeo Moodle API plugin
- Unzip it and rename **openveo-moodle-api-\*** directory into **openveo_api**
- Download latest stable [OpenVeo REST PHP client](https://github.com/veo-labs/openveo-rest-php-client) as a zip file
- Unzip the **openveo-rest-php-client.zip** file in **openveo_api/lib** folder
- Rename **openveo_api/lib/openveo-rest-php-client-\*** into **openveo_api/lib/openveo-rest-php-client**
- Move your **openveo_api** folder into **MOODLE_ROOT_PATH/local/** where MOODLE_ROOT_PATH is your Moodle installation folder
- In your Moodle site (as admin) go to **Site administration > Notifications**: you should get a message saying the plugin is installed

If you experience troubleshooting during installation, please refer to the [Moodle](https://docs.moodle.org) installation plugin documentation.

## Usage

```php
// Include OpenVeo REST PHP client autoloader.
require_once($CFG->dirroot . '/local/openveo_api/lib.php');

// Use OpenVeo REST PHP client (see https://github.com/veo-labs/openveo-rest-php-client for more information).
use Openveo\Client\Client;
```

# Contributors

Maintainer: [Veo-Labs](http://www.veo-labs.com/)

# License

[GPL3](http://www.gnu.org/licenses/gpl.html)

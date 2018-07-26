<?php

use Psr\Container\ContainerInterface;
use RebelCode\EddBookings\Licensing\EddBkLicensingModule;

define('RCMOD_EDDBK_LICENSING_KEY', 'eddbk_licensing');
define('RCMOD_EDDBK_LICENSING_DIR', __DIR__);
define('RCMOD_EDDBK_LICENSING_CONFIG_FILE', RCMOD_EDDBK_LICENSING_DIR . '/config.php');
define('RCMOD_EDDBK_LICENSING_SERVICES_FILE', RCMOD_EDDBK_LICENSING_DIR . '/services.php');

return function (ContainerInterface $c) {
    return new EddBkLicensingModule(
        RCMOD_EDDBK_LICENSING_KEY,
        [],
        RCMOD_EDDBK_LICENSING_CONFIG_FILE,
        RCMOD_EDDBK_LICENSING_SERVICES_FILE,
        $c->get('container_factory'),
        $c->get('composite_container_factory'),
        $c->get('config_factory'),
        $c->get('event_manager'),
        $c->get('event_factory')
    );
};

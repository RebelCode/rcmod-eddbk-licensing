<?php

use Psr\Container\ContainerInterface;

return [
    'eddbk_license' => function(ContainerInterface $c) {
        return new EDD_License(
            $c->get('eddbk/file_path'),
            $c->get('eddbk_licensing/server_name'),
            $c->get('eddbk/version'),
            $c->get('eddbk/author'),
            null,
            $c->get('eddbk_licensing/server_url')
        );
    },
];

<?php

use Psr\Container\ContainerInterface;

return [
    'eddbk_license' => function(ContainerInterface $c) {
        return new EDD_License(
            $c->get('eddbk_licensing/plugin_file_path'),
            $c->get('eddbk_licensing/item_name'),
            $c->get('eddbk_licensing/plugin_version'),
            $c->get('eddbk_licensing/author_name'),
            null,
            $c->get('eddbk_licensing/server_url')
        );
    },
];

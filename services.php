<?php

use Psr\Container\ContainerInterface;

return [
    'eddbk_license' => function(ContainerInterface $c) {
        return new EDD_License(
            EDDBK_FILE,
            $c->get('eddbk_licensing/item_name'),
            EDDBK_VERSION,
            $c->get('eddbk_licensing/author_name'),
            null,
            $c->get('eddbk_licensing/server_url')
        );
    },
];

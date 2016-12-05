<?php

return [
    'dependencies' => [
        'factories' => [
            Application\Ping\PingHandler::class => Application\Ping\PingHandlerFactory::class,
        ],
    ]
];

<?php

return [
    'dependencies' => [
        'factories' => [
            Application\Ping\PingHandler::class => Application\Ping\PingHandlerFactory::class,
            Application\User\SignUp::class      => Application\User\SignUpFactory::class,
        ],
    ]
];

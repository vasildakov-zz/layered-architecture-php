<?php // Application

return [
    'dependencies' => [
        'factories' => [
            Application\Ping\Ping::class   => Application\Ping\PingFactory::class,
            Application\User\SignUp::class => Application\User\SignUpFactory::class,
        ],
    ]
];

<?php

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\ZendRouter::class,
        ],
        'factories' => [
            //Middleware\HomePageAction::class => Middleware\HomePageFactory::class,
            //Middleware\BooksAction::class => Middleware\BooksActionFactory::class,
            Presentation\Api\Action\PingAction::class   => Presentation\Api\Action\PingActionFactory::class,
            Presentation\Api\Action\SignUpAction::class => Presentation\Api\Action\SignUpActionFactory::class,
        ],
    ],
    'routes' => [
        [
            'name' => 'home',
            'path' => '/',
            'middleware' => App\Action\HomePageAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'api.ping',
            'path' => '/api/ping',
            'middleware' => Presentation\Api\Action\PingAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'api.users.signup',
            'path' => '/api/users',
            'middleware' => Presentation\Api\Action\SignUpAction::class,
            'allowed_methods' => ['POST'],
        ],
    ],
];

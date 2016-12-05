<?php

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\ZendRouter::class,
        ],
        'factories' => [
            //Middleware\HomePageAction::class => Middleware\HomePageFactory::class,
            //Middleware\BooksAction::class => Middleware\BooksActionFactory::class,
            Presentation\Api\Action\PingAction::class     => Presentation\Api\Action\PingActionFactory::class,
            //Presentation\Api\TransferAction::class => Infrastructure\Ui\Api\TransferActionFactory::class,
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
        /*[
            'name' => 'api.users.get',
            'path' => '/api/users',
            'middleware' => Presentation\Api\GetUserAction::class,
            'allowed_methods' => ['GET'],
        ],*/
    ],
];

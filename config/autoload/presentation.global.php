<?php // Presentation

return [
    'dependencies' => [
        'factories' => [
            // Ping API
            Presentation\Api\Action\PingAction::class   => Presentation\Api\Action\PingActionFactory::class,

            // Users API
            Presentation\Api\Action\SignUpAction::class => Presentation\Api\Action\SignUpActionFactory::class,
            Presentation\Api\SignUpFilter::class => Presentation\Api\SignUpFilterFactory::class,
        ],
    ]
];

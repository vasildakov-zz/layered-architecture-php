<?php // Presentation

return [
    'dependencies' => [
        'factories' => [
            Presentation\Api\Action\PingAction::class   => Presentation\Api\Action\PingActionFactory::class,
            Presentation\Api\Action\SignUpAction::class => Presentation\Api\Action\SignUpActionFactory::class,
        ],
    ]
];

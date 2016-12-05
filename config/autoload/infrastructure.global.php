<?php // Infrasrructure

return [
    'dependencies' => [
        'factories' => [
            // Command Bus
            League\Tactician\CommandBus::class => Infrastructure\Bus\Tactician\CommandBusFactory::class,

            // Logger
            Monolog\Logger::class  => Infrastructure\Logger\Monolog\LoggerFactory::class,
            Zend\Log\Logger::class => Infrastructure\Logger\Zend\LoggerFactory::class,

            // Doctrine
            Doctrine\ORM\EntityManager::class => Infrastructure\Doctrine\EntityManagerFactory::class,

            // Repository
            Infrastructure\Repository\Mock\UserRepository::class => Infrastructure\Repository\Mock\UserRepositoryFactory::class
        ],
    ]
];

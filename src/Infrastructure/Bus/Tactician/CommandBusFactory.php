<?php
declare(strict_types = 1);

namespace Infrastructure\Bus\Tactician;

use League\Tactician\CommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Container\ContainerLocator;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\MethodNameInflector\InvokeInflector;
use Interop\Container\ContainerInterface;

/**
 * Class CommandBusFactory
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class CommandBusFactory
{
    /**
     * @param  ContainerInterface $container
     * @return CommandBus
     */
    public function __invoke(ContainerInterface $container)
    {
        $inflector = new InvokeInflector();

        $commandsMapping = [
            \Application\Ping\PingRequest::class   => \Application\Ping\Ping::class,
            \Application\User\SignUpRequest::class => \Application\User\SignUp::class,
        ];

        $locator = new ContainerLocator($container, $commandsMapping);

        $nameExtractor = new ClassNameExtractor();

        $commandHandlerMiddleware = new CommandHandlerMiddleware(
            $nameExtractor,
            $locator,
            $inflector
        );

        $commandBus = new CommandBus([
            $commandHandlerMiddleware
        ]);

        return $commandBus;
    }
}
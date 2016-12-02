<?php
namespace Application\Container;

use Interop\Container\ContainerInterface;

use League\Tactician\CommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Container\ContainerLocator;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\MethodNameInflector\InvokeInflector;


use Application\Command\Ping as PingCommand;
use Application\CommandHandler\Ping as PingCommandHandler;

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
            PingCommand::class => PingCommandHandler::class
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

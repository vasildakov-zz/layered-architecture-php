<?php
declare(strict_types = 1);

namespace Presentation\Api\Action;

use Interop\Container\ContainerInterface;
use League\Tactician\CommandBus;

/**
 * Class PingAction
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class PingActionFactory
{
    /**
     * @param  ContainerInterface $container
     * @return PingAction
     */
    public function __invoke(ContainerInterface $container)
    {
        if (!$container->has(CommandBus::class)) {
            throw new \Exception("CommandBus is not configured");
        }

        $bus = $container->get(CommandBus::class);

        return new PingAction($bus);
    }
}

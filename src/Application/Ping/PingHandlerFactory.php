<?php
declare(strict_types = 1);

namespace Application\Ping;

use Interop\Container\ContainerInterface;

use Monolog\Logger as MonologLogger;
use Zend\Log\Logger as ZendLogger;

/**
 * Class PingHandlerFactory
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class PingHandlerFactory
{
    /**
     * @param  ContainerInterface $container
     * @return Ping
     */
    public function __invoke(ContainerInterface $container)
    {
        $logger = $container->get(ZendLogger::class);

        return new PingHandler($logger);
    }
}

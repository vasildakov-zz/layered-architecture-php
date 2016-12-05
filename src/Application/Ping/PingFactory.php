<?php
declare(strict_types = 1);

namespace Application\Ping;

use Interop\Container\ContainerInterface;

/**
 * Class PingFactory
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class PingFactory
{
    /**
     * @param  ContainerInterface $container
     * @return Ping
     */
    public function __invoke(ContainerInterface $container)
    {
        $logger = $container->get(\Zend\Log\Logger::class);

        return new Ping($logger);
    }
}

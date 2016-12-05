<?php
declare(strict_types = 1);

namespace Infrastructure\Logger\Monolog;

use Interop\Container\ContainerInterface;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * Class MonologFactory
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class LoggerFactory
{
    /**
     * @param  ContainerInterface $container
     * @return Logger
     */
    public function __invoke(ContainerInterface $container)
    {
        $logger = new Logger('name');
        $logger->pushHandler(new StreamHandler('./data/log/application.log', Logger::INFO));

        return $logger;
    }
}

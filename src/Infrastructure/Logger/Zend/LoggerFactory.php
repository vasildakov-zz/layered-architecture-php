<?php
declare(strict_types = 1);

namespace Infrastructure\Logger\Zend;

use Interop\Container\ContainerInterface;

use Zend\Log\Logger;
use Zend\Log\Writer\Stream;
use Zend\Log\PsrLoggerAdapter;

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
        $logger = new Logger();
        $logger->addWriter(new Stream('./data/log/application.log'));

        return new PsrLoggerAdapter($logger);
    }
}

<?php
declare(strict_types = 1);

namespace Application\Ping;

use Psr\Log\LoggerInterface;

/**
 * Class PingHandler
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class PingHandler
{
    /**
     * @var LoggerInterface
     */
    private $logger;


    /**
     * @param LoggerInterface $accounts
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }


    /**
     * @param  PingCommand $command
     * @return
     */
    public function __invoke(PingCommand $command)
    {
        $time = $command->time();
        $this->logger->info(sprintf('Ping time %s', $time));
    }
}

<?php
declare(strict_types = 1);

namespace Application\Ping;

use Psr\Log\LoggerInterface;

/**
 * Class Ping Service
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class Ping implements PingInterface
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
     * @return PingResponse
     */
    public function __invoke(PingRequest $command): PingResponse
    {
        $time = $command->time();

        $this->logger->info(sprintf('Ping time %s', $time));

        return new PingResponse($time);
    }
}

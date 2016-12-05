<?php
declare(strict_types = 1);

namespace Application\Ping;

/**
 * Class PingCommand
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class PingCommand
{
    private $time;

    public function __construct()
    {
        $this->time = time();
    }

    public function time()
    {
        return $this->time;
    }
}
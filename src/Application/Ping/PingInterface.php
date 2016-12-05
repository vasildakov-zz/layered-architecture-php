<?php
namespace Application\Ping;

/**
 * Interface PingInterface
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface PingInterface
{
    /**
     * @param  PingRequest    $request
     * @return PingResponse   $response
     */
    public function __invoke(PingRequest $request): PingResponse;
}

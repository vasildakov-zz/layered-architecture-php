<?php
declare(strict_types = 1);

namespace Presentation\Api\Action;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Zend\Diactoros\Response\JsonResponse;
use League\Tactician\CommandBus;

use Application\Ping\PingRequest;
use Application\Ping\PingResponse;

/**
 * Class PingAction
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class PingAction
{
    /**
     * @var \League\Tactician\CommandBus
     */
    private $bus;

    /**
     * @param \League\Tactician\CommandBus $bus
     */
    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }

    /**
     * @param  Request                $request
     * @param  Response               $response
     * @param  callable|null          $next
     * @return JsonResponse
     */
    public function __invoke(Request $request, Response $response, callable $next = null)
    {
        try {
            $PingRequest  = new PingRequest(new \DateTime);
            $PingResponse = $this->bus->handle($PingRequest);

            return new JsonResponse($PingResponse, 200);

        } catch (\Exception $e) {
            // handle exceptions
        }
    }
}

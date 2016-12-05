<?php
declare(strict_types = 1);

namespace Presentation\Api\Action;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Zend\Diactoros\Response\JsonResponse;
use League\Tactician\CommandBus;

use Application\Ping\PingRequest;

/**
 * Class PingAction
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class PingAction
{
    /**
     * @var CommandBus
     */
    private $bus;

    /**
     * @param CommandBus $bus
     */
    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }

    /**
     * @param  ServerRequestInterface $request
     * @param  ResponseInterface      $response
     * @param  callable|null          $next
     * @return Response
     */
    public function __invoke(Request $request, Response $response, callable $next = null)
    {
        $command = new PingRequest(new \DateTime);

        $result = $this->bus->handle($command);

        return new JsonResponse($result, 200);
    }
}

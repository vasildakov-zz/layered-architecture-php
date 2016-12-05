<?php
namespace Presentation\Api\Action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use League\Tactician\CommandBus;
use Zend\Stratigility\MiddlewareInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Json\Json;

use Application\User\SignUpRequest;
use Application\User\SignUpResponse;

class SignUpAction implements MiddlewareInterface
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
        $this->filter = (new SignUpFilter())();
    }

    /**
     * @param  Request       $request
     * @param  Response      $response
     * @param  callable|null $next
     * @return mixed Response|callable
     */
    public function __invoke(Request $request, Response $response, callable $next = null)
    {
        $body    = $request->getBody();
        $content = Json::decode($body->getContents(), Json::TYPE_ARRAY);


        $this->filter->setData($content);
        if(!$this->filter->isValid()) {
            $errors = $this->filter->getMessages();
            return new JsonResponse($errors, 400);
        }

        try {
            $command = new SignUpRequest(
                $this->filter->getValue('email'),
                $this->filter->getValue('password')
            );

            $result = $this->bus->handle($command);

            return new JsonResponse($result, 200);

        } catch (\Exception $e) {
            //
        }
    }
}

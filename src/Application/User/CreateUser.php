<?php
namespace Application\User;

use Domain\Entity\User;
use Domain\ValueObject\Email;
use Domain\ValueObject\Password;
use Domain\Repository\UserRepositoryInterface;
use Domain\Service\IdentityGenerator;
use Domain\Service\HashingService;

use Application\User\CreateUserRequest as Request;
use Application\User\CreateUserResponse as Response;

use Psr\Log\LoggerInterface;

/**
 * Use Case CreateUser
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class CreateUser implements CreateUserInterface
{
    /**
     * @var \Domain\Repository\UserRepositoryInterface
     */
    private $users;

    /**
     * @var \Domain\Service\IdentityGenerator
     */
    private $generator;

    /**
     * @var \Domain\Service\HashingService
     */
    private $hasher;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;


    /**
     * @param UserRepositoryInterface $users
     * @param LoggerInterface $logger
     */
    public function __construct(
        UserRepositoryInterface $users,
        IdentityGenerator $generator,
        HashingService $hasher,
        LoggerInterface $logger
    ) {
        $this->users     = $users;
        $this->generator = $generator;
        $this->hasher    = $hasher;
        $this->logger    = $logger;
    }


    /**
     * @param  CreateUserRequest  $request
     * @return CreateUserResponse $response
     */
    public function __invoke(Request $request): Response
    {
        $id    = ($this->generator)();
        $email = (new Email($request->email()));
        $hash  = ($this->hasher)(new Password($request->password()));

        $user = new User($id, $email, $hash);
        // $this->users->add($user);

        return new Response($user);
    }
}

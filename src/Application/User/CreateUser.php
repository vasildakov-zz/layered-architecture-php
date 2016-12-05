<?php
namespace Application\User;

use Domain\Entity\User;

use Domain\ValueObject\Uuid;
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
        HashingService $hasher,
        LoggerInterface $logger
    ) {
        $this->users     = $users;
        $this->hasher    = $hasher;
        $this->logger    = $logger;
    }


    /**
     * @param  CreateUserRequest  $request
     * @return CreateUserResponse $response
     */
    public function __invoke(Request $command): Response
    {
        $user = new User(
            new Uuid($command->id()),
            new Email($command->email()),
            ($this->hasher)(new Password($command->password()))
        );

        // $this->users->add($user);

        return new Response($user);
    }
}

<?php
namespace Application\User;

use Domain\Entity\User;
use Domain\ValueObject\Identity;
use Domain\ValueObject\Email;
use Domain\ValueObject\Password;
use Domain\Repository\UserRepositoryInterface;
use Domain\Service\HashingService;

use Application\User\SignUpRequest;
use Application\User\SignUpResponse;

use Psr\Log\LoggerInterface;

/**
 * Use Case SignUp
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class SignUp implements SignUpInterface
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
     * @param LoggerInterface         $logger
     */
    public function __construct(
        UserRepositoryInterface $users,
        LoggerInterface $logger
    ) {
        $this->users     = $users;
        $this->logger    = $logger;
    }


    /**
     * @param  SignUpRequest  $request
     * @return SignUpResponse $response
     */
    public function __invoke(SignUpRequest $command): SignUpResponse
    {
        $user = new User(
            Identity::generate(),
            new Email($command->email()),
            new Password($command->password())
        );

        $this->users->save($user);

        $this->logger->info(sprintf("new user has been created id: %s", $user->getId()));

        return new SignUpResponse($user);
    }
}

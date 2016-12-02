<?php
namespace Application\User;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception;
use Psr\Log\LoggerInterface;

use Domain\Repository\UserRepositoryInterface;
use Domain\Service\IdentityGenerator;
use Domain\Service\HashingService;

/**
 * Class CreateUserFactory
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class CreateUserFactory
{
    /**
     * @param ContainerInterface $container
     * @return CreateUser
     */
    public function __invoke(ContainerInterface $container)
    {
        $users     = $container->get(UserRepositoryInterface::class);
        $generator = $container->get(IdentityGenerator::class);
        $hasher    = $container->get(HashingService::class);
        $logger    = $container->get(LoggerInterface::class);

        return new CreateUser($users, $generator, $hasher, $logger);
    }
}

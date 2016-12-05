<?php
declare(strict_types = 1);

namespace Infrastructure\Repository\Mock;

use Interop\Container\ContainerInterface;

/**
 * Class UserRepositoryFactory
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class UserRepositoryFactory
{
    /**
     * @param  ContainerInterface $container
     * @return UserRepository
     */
    public function __invoke(ContainerInterface $container)
    {
        return new UserRepository();
    }
}

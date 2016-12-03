<?php
namespace Domain\Repository;

use Domain\Entity\User;
use Domain\ValueObject\Identity;

/**
 * UserRepositoryInterface
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface UserRepositoryInterface
{
    /**
     * @param  \Domain\Entity\User   $user
     * @return void
     */
    public function save(User $user);

    /**
     * @param  \Domain\ValueObject\Identity   $id
     * @return User|null
     */
    public function find(Identity $id);
}

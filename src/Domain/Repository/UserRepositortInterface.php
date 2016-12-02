<?php
namespace Domain\Repository;

use Domain\Entity\User;

/**
 * UserRepositoryInterface
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface UserRepositoryInterface
{
    /**
     * @param  User   $user
     * @return void
     */
    public function save(User $user);

    /**
     * @param  Uuid   $id
     * @return User|null
     */
    public function find(Uuid $id);
}

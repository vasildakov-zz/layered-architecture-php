<?php
namespace Infrastructure\Repository\Mock;

use Domain\Entity\User;
use Domain\ValueObject\Identity;
use Domain\Repository\UserRepositoryInterface;

/**
 * Mock UserRepository
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class UserRepository implements UserRepositoryInterface
{
    protected $items = [];

    public function __construct()
    {

    }


    public function save(User $user)
    {
        $key = (string) $user->getId();
        if (isset($this->items[$key])) {
            throw new \Exception("User with ID $key already exist.");
        }
        $this->items[$key] = $user;
    }


    public function remove(User $user)
    {
        $key = (string)$user->getId();
        if (isset($this->items[$key])) {
            unset($this->items[$key]);
        }
    }


    public function find(Identity $id)
    {
        foreach ($this->items as $item) {
            if ($item->getId()->equals($id)) {
                return $item;
            }
        }
        return null;
    }


    public function count()
    {
        return count($this->items);
    }


    public function keys()
    {
        return array_keys($this->items);
    }


    public function keyExists($key)
    {
        return isset($this->items[$key]);
    }
}

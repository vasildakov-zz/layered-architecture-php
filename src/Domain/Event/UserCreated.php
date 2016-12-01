<?php
namespace Domain\Event;

use Domain\Entity\User;

/**
 * Class UserCreated
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class UserCreated implements EventInteface
{
    /**
     * @var \Domain\Entity\User
     */
    private $user;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->id    = (string) $user->getId();
        $this->email = (string) $user->getEmail();
    }

    public function id()
    {
        return $this->id;
    }

    public function email()
    {
        return $this->email;
    }
}

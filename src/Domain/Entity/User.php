<?php
declare(strict_types = 1);

namespace Domain\Entity;

use Domain\ValueObject\IdentityInterface as Identity;
use Domain\ValueObject\EmailInterface as Email;
use Domain\ValueObject\Password;

/**
 * Class User
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class User implements UserInterface
{
    /**
     * @var \Domain\ValueObject\Identity
     */
    private $id;

    /**
     * @var \Domain\ValueObject\Email
     */
    private $email;

    /**
     * @var \Domain\ValueObject\HashedPassword
     */
    private $password;


    /**
     * @param IdentityInterface        $id
     * @param EmailInterface           $email
     * @param Password                 $password
     */
    public function __construct(Identity $id, Email $email, Password $password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;

        //$this->raise(new Event\UserIsCreated($this));
    }


    private function raise(EventInteface $event)
    {
        //$this->events[] = $event;
    }


    /**
     * @return \Domain\ValueObject\Identity  $id
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return \Domain\ValueObject\Email $email
     */
    public function getEmail()
    {
        return $this->email;
    }


    /**
     * @param \Domain\ValueObject\Password $password
     */
    public function setPassword(Password $password)
    {
        $this->password = $password;
    }


    /**
     * @return \Domain\ValueObject\Password $password
     */
    public function getPassword()
    {
        return $this->password;
    }
}

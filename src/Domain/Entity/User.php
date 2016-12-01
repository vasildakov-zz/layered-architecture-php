<?php
declare(strict_types = 1);

namespace Domain\Entity;

use Domain\ValueObject\Uuid;
use Domain\ValueObject\Email;
use Domain\ValueObject\PasswordHash;

/**
 * Class User
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class User implements UserInterface
{
    /**
     * @var \Domain\ValueObject\Uuid  $id
     */
    private $id;

    /**
     * @var \Domain\ValueObject\Email  $email
     */
    private $email;

    /**
     * @var \Domain\ValueObject\PasswordHash  $password
     */
    private $password;


    /**
     * @param \Domain\ValueObject\Uuid            $id
     * @param \Domain\ValueObject\Email           $email
     * @param \Domain\ValueObject\PasswordHash    $password
     */
    public function __construct(Uuid $id, Email $email, PasswordHash $password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return \Domain\ValueObject\Uuid  $id
     */
    public function getId(): Uuid
    {
        return $this->id;
    }

    /**
     * @return \Domain\ValueObject\Email $email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }


    /**
     * @param \Domain\ValueObject\PasswordHash $password
     */
    public function setPassword(PasswordHash $password)
    {
        $this->password = $password;
    }


    /**
     * @return \Domain\ValueObject\PasswordHash $password
     */
    public function getPassword(): PasswordHash
    {
        return $this->password;
    }
}

<?php
declare(strict_types = 1);

namespace Domain\Entity;

use Domain\ValueObject\Uuid;
use Domain\ValueObject\Email;
use Domain\ValueObject\HashedPassword;

/**
 * Class User
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class User implements UserInterface
{
    /**
     * @var \Domain\ValueObject\Uuid
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
     * @param \Domain\ValueObject\Uuid            $id
     * @param \Domain\ValueObject\Email           $email
     * @param \Domain\ValueObject\HashedPassword  $password
     */
    public function __construct(Uuid $id, Email $email, HashedPassword $password)
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
     * @param \Domain\ValueObject\HashedPassword $password
     */
    public function setPassword(HashedPassword $password)
    {
        $this->password = $password;
    }


    /**
     * @return \Domain\ValueObject\HashedPassword $password
     */
    public function getPassword(): HashedPassword
    {
        return $this->password;
    }
}

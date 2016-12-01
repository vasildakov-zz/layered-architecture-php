<?php
declare(strict_types = 1);

namespace Domain\Entity;

use Domain\ValueObject\Uuid;
use Domain\ValueObject\Email;

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
     * @param \Domain\ValueObject\Uuid  $id
     * @param \Domain\ValueObject\Email $email
     */
    public function __construct(Uuid $id, Email $email)
    {
        $this->id = $id;
        $this->email = $email;
    }

    /**
     * @return \Domain\ValueObject\Uuid  $id
     */
    public function getId() : Uuid
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
}

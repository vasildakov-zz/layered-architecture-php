<?php
declare(strict_types = 1);

namespace Domain\Entity;

use Domain\ValueObject\Uuid;
use Domain\ValueObject\Email;

class User
{
    private $id;

    private $email;

    public function __construct(Uuid $id, Email $email)
    {
        $this->id = $id;
        $this->email = $email;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }
}

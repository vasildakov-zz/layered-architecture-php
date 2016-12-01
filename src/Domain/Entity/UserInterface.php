<?php
namespace Domain\Entity;

use Domain\ValueObject\Uuid;
use Domain\ValueObject\Email;

/**
 * UserInterface
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface UserInterface
{
    /**
     * @return \Domain\ValueObject\Uuid
     */
    public function getId() : Uuid;

    /**
     * @return \Domain\ValueObject\Email
     */
    public function getEmail() : Email;

}

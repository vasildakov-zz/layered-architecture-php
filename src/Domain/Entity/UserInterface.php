<?php
namespace Domain\Entity;

use Domain\ValueObject\Uuid;
use Domain\ValueObject\Email;
use Domain\ValueObject\HashedPassword;

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

    /**
     * @param \Domain\ValueObject\HashedPassword
     */
    public function setPassword(HashedPassword $hash);

    /**
     * @return \Domain\ValueObject\HashedPassword
     */
    public function getPassword() : HashedPassword;

}

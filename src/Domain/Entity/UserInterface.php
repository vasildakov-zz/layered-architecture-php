<?php
namespace Domain\Entity;

use Domain\ValueObject\Identity;
use Domain\ValueObject\Email;
use Domain\ValueObject\Password;

/**
 * UserInterface
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface UserInterface
{
    /**
     * @return \Domain\ValueObject\Identity
     */
    public function getId();

    /**
     * @return \Domain\ValueObject\Email
     */
    public function getEmail();

    /**
     * @param \Domain\ValueObject\Password
     */
    public function setPassword(Password $hash);

    /**
     * @return \Domain\ValueObject\Password
     */
    public function getPassword();
}

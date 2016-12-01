<?php
/**
 * Separated Interface
 * @see http://martinfowler.com/eaaCatalog/separatedInterface.html
 */
namespace Domain\Service;

use Domain\ValueObject\Password;
use Domain\ValueObject\PasswordHash;

/**
 * Interface PasswordHasher
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface PasswordHasher
{
    /**
     * Returns hashed password
     * @return string
     */
    public function __invoke(Password $password) : PasswordHash;
}

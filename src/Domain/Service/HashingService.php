<?php
/**
 * Separated Interface
 * @see http://martinfowler.com/eaaCatalog/separatedInterface.html
 */
namespace Domain\Service;

use Domain\ValueObject\Password;
use Domain\ValueObject\HashedPassword;

/**
 * Interface HashingService
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface HashingService
{
    /**
     * Returns hashed password
     *
     * @param  Password $password
     * @return HashedPassword
     */
    public function __invoke(Password $password) : HashedPassword;
}

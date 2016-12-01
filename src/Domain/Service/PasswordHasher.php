<?php
/**
 * Separated Interface
 * @see http://martinfowler.com/eaaCatalog/separatedInterface.html
 */
namespace Domain\Service;

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
    public function __invoke() : string;
}

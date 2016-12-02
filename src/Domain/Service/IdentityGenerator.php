<?php
/**
 * Separated Interface
 * @see http://martinfowler.com/eaaCatalog/separatedInterface.html
 */
namespace Domain\Service;

use Domain\ValueObject\Uuid;

/**
 * Interface IdentityGenerator
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface IdentityGenerator
{
    /**
     * Returns unique identity
     * @return Uuid
     */
    public function __invoke() : Uuid;
}

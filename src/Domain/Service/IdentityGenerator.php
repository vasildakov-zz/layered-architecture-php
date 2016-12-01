<?php
/**
 * Separated Interface
 * @see http://martinfowler.com/eaaCatalog/separatedInterface.html
 */
namespace Domain\Service;

/**
 * Interface IdentityGenerator
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface IdentityGenerator
{
    /**
     * Returns unique identity
     * @return string
     */
    public function __invoke() : string;
}

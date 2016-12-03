<?php
namespace Domain\ValueObject;

interface IdentityInterface
{
    /**
     * @param  UuidInterface $other
     * @return bool
     */
    public function equals(IdentityInterface $other);
}

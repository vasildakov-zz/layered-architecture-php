<?php
namespace Domain\ValueObject;

interface UuidInterface
{
    /**
     * @param  UuidInterface $other
     * @return bool
     */
    public function equals(UuidInterface $other);

}

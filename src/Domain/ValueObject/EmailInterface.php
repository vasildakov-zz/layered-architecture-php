<?php
namespace Domain\ValueObject;

interface EmailInterface
{
    /**
     * @param  EmailInterface $other
     * @return bool
     */
    public function equals(EmailInterface $other);

}

<?php
namespace Domain\ValueObject;

interface CurrencyInterface
{
    /**
     * @param  CurrencyInterface $other
     * @return bool
     */
    public function equals(CurrencyInterface $other);
}

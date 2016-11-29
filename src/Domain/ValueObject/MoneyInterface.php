<?php
namespace Domain\ValueObject;

interface MoneyInterface
{
    /**
     * @param  MoneyInterface $other
     * @return bool
     */
    public function equals(MoneyInterface $other);

    /**
     * @param  MoneyInterface $other
     * @return static
     */
    public function add(MoneyInterface $other);

    /**
     * @param  MoneyInterface $other
     * @return static
     */
    public function subtract(MoneyInterface $other);
}

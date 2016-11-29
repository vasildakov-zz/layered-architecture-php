<?php
declare(strict_types = 1);

namespace Domain\ValueObject;

final class Money implements MoneyInterface, \JsonSerializable
{
   /**
     * @var integer
     */
    private $amount;

    /**
     * @var Currency
     */
    private $currency;

    /**
     * @param  integer $amount
     * @param  Currency|string $currency
     * @throws InvalidArgumentException
     */
    public function __construct($amount, $currency)
    {
        if (!is_int($amount)) {
            throw new \InvalidArgumentException('$amount must be an integer');
        }

        $this->amount = $amount;
    }


    /**
     * Returns the monetary value represented by this object.
     *
     * @return integer
     */
    public function getAmount()
    {
        return $this->amount;
    }


    /**
     * Compares this Money object to another.
     *
     * Returns an integer less than, equal to, or greater than zero
     * if the value of this Money object is considered to be respectively
     * less than, equal to, or greater than the other Money object.
     *
     * @param Money $other
     * @return integer -1|0|1
     * @throws Exception
     */
    public function compareTo(Money $other)
    {
        $this->assertSameCurrency($this, $other);
        if ($this->amount == $other->getAmount()) {
            return 0;
        }
        return $this->amount < $other->getAmount() ? -1 : 1;
    }


    public function equals(Money $other)
    {
        return $this->compareTo($other) == 0;
    }


    /**
     * Returns a new Money object that represents the monetary value
     * of the sum of this Money object and another.
     *
     * @param  \SebastianBergmann\Money\Money $other
     * @return static
     */
    public function add(Money $other)
    {
        $this->assertSameCurrency($this, $other);

        $value = $this->amount + $other->getAmount();

        $this->assertIsInteger($value);

        return $this->newMoney($value);
    }


    /**
     * Returns a new Money object that represents the monetary value
     * of the difference of this Money object and another.
     *
     * @param  \SebastianBergmann\Money\Money $other
     * @return static
     */
    public function subtract(Money $other)
    {
        $this->assertSameCurrency($this, $other);

        $value = $this->amount - $other->getAmount();

        $this->assertIsInteger($value);

        return $this->newMoney($value);
    }

    /**
     * @param  Money $a
     * @param  Money $b
     * @throws Exception
     */
    private function assertSameCurrency(Money $a, Money $b)
    {
        if ($a->getCurrency() != $b->getCurrency()) {
            throw new Exception;
        }
    }

    /**
     * Specify data which should be serialized to JSON
     *
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * @link   http://php.net/manual/en/jsonserializable.jsonserialize.php
     */
    public function jsonSerialize()
    {
        return [
            'amount'   => $this->amount,
            'currency' => $this->currency->getCurrencyCode()
        ];
    }
}

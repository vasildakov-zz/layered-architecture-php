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
     * @param Money $other
     * @return integer -1|0|1
     * @throws Exception
     */
    public function compareTo(MoneyInterface $other)
    {
        $this->assertSameCurrency($this, $other);
        if ($this->amount == $other->getAmount()) {
            return 0;
        }
        return $this->amount < $other->getAmount() ? -1 : 1;
    }


    public function equals(MoneyInterface $other)
    {
        return $this->compareTo($other) == 0;
    }


    /**
     * @param  MoneyInterface $other
     * @return static
     */
    public function add(MoneyInterface $other)
    {
        $this->assertSameCurrency($this, $other);

        $value = $this->amount + $other->getAmount();

        $this->assertIsInteger($value);

        return $this->newMoney($value);
    }


    /**
     * @param  MoneyInterface $other
     * @return static
     */
    public function subtract(MoneyInterface $other)
    {
        $this->assertSameCurrency($this, $other);

        $value = $this->amount - $other->getAmount();

        $this->assertIsInteger($value);

        return $this->newMoney($value);
    }

    /**
     * @param  MoneyInterface $a
     * @param  MoneyInterface $b
     * @throws Exception
     */
    private function assertSameCurrency(MoneyInterface $a, MoneyInterface $b)
    {
        if ($a->getCurrency() != $b->getCurrency()) {
            throw new \Exception;
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

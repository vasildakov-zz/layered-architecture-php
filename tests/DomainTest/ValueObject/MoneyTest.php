<?php
namespace DomainTest\ValueObject;

use Domain\ValueObject\Money;
use Domain\ValueObject\MoneyInterface;
use Domain\ValueObject\Currency;

class MoneyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @group domain
     */
    public function testCanBeConstructedWithObject()
    {
        $money = new Money(100, new Currency('GBP'));

        self::assertInstanceOf(MoneyInterface::class, $money);
    }

    /**
     * @group domain
     */
    public function testCanBeConstructedWithString()
    {
        self::assertInstanceOf(MoneyInterface::class, new Money(100, 'GBP'));
        self::assertInstanceOf(MoneyInterface::class, new Money(100, 'USD'));
        self::assertInstanceOf(MoneyInterface::class, new Money(100, 'EUR'));
    }

    /**
     * domain
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage $amount must be an integer
     */
    public function testConstructorThrowsAnException()
    {
        $money = new Money('100', new Currency('GBP'));
    }
}

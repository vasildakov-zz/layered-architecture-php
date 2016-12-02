<?php
namespace DomainTest\ValueObject;

use Domain\ValueObject\CurrencyInterface;
use Domain\ValueObject\Currency;

class CurrencyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @group domain
     */
    public function testCanBeConstructedWithValidCode()
    {
        self::assertInstanceOf(CurrencyInterface::class, new Currency('GBP'));
        self::assertInstanceOf(CurrencyInterface::class, new Currency('USD'));
        self::assertInstanceOf(CurrencyInterface::class, new Currency('EUR'));
    }

    /**
     * @group domain
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Unknown currency code "AUD"
     */
    public function testConstructorThrowsAnException()
    {
        $currency = new Currency('AUD');
    }
}

<?php
namespace DomainTest\ValueObject;

use Domain\ValueObject\Email;

class EmailTest extends \PHPUnit_Framework_TestCase
{
    private $faker;

    public function setUp()
    {
        $this->faker = \Faker\Factory::create();
    }

    public function testObjectCanBeConstructedWithValidUuid1()
    {
        $value = $this->faker->unique()->email;

        self::assertInstanceOf(Email::class, new Email($value));
    }


    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage "invalid" is not a valid email
     */
    public function testConstructorThrowsAnException()
    {
        $money = new Email('invalid');
    }


    public function testTwoObjectsAreEqual()
    {
        $value = $this->faker->unique()->email;

        $a = new Email($value);
        $b = new Email($value);

        self::assertTrue($a->equals($b));
    }

    public function testTwoObjectsAreNotEqual()
    {
        $value1 = $this->faker->unique()->email;
        $value2 = $this->faker->unique()->email;

        $a = new Email($value1);
        $b = new Email($value2);

        self::assertFalse($a->equals($b));
    }
}

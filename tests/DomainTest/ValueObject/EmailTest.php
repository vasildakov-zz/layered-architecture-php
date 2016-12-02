<?php
namespace DomainTest\ValueObject;

use Domain\ValueObject\Email;

class EmailTest extends \PHPUnit_Framework_TestCase
{
    private $faker;

    protected function setUp()
    {
        $this->faker = \Faker\Factory::create();
    }

    /**
     * @group domain
     */
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
        $email = new Email('invalid');
    }

    /**
     * @group domain
     */
    public function testTwoObjectsAreEqual()
    {
        $value = $this->faker->unique()->email;

        $a = new Email($value);
        $b = new Email($value);

        self::assertTrue($a->equals($b));
    }

    /**
     * @group domain
     */
    public function testTwoObjectsAreNotEqual()
    {
        $value1 = $this->faker->unique()->email;
        $value2 = $this->faker->unique()->email;

        $a = new Email($value1);
        $b = new Email($value2);

        self::assertFalse($a->equals($b));
    }
}

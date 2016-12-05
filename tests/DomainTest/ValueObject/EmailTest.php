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
        $a = new Email($this->faker->unique()->email);
        $b = new Email($this->faker->unique()->email);

        self::assertFalse($a->equals($b));
    }

    /**
     * @group domain
     */
    public function testItCanBeJsonSerialized()
    {
        $email = new Email('vasildakov@gmail.com');
        $array = $email->jsonSerialize();

        self::assertInternalType('array', $array);
        self::assertArrayHasKey('email', $array);
        self::assertEquals('vasildakov@gmail.com', $array['email']);
    }

    /**
     * @group domain
     */
    public function testItCanBeConvertedToString()
    {
        $email = new Email('vasildakov@gmail.com');

        self::assertInternalType('string', (string) $email);
    }
}

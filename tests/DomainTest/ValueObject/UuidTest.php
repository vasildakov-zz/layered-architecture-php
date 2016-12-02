<?php
namespace DomainTest\ValueObject;

use Domain\ValueObject\Uuid;

class UuidTest extends \PHPUnit_Framework_TestCase
{
    private $faker;

    public function setUp()
    {
        $this->faker = \Faker\Factory::create();
    }

    /**
     * @group domain
     */
    public function testObjectCanBeConstructedWithValidUuid1()
    {
        $value = $this->faker->unique()->uuid;

        self::assertInstanceOf(Uuid::class, new Uuid($value));
    }

    /**
     * @group domain
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage "some-invalid-uuid-string" is not a valid uuid
     */
    public function testConstructorThrowsAnException()
    {
        $uuid = new Uuid('some-invalid-uuid-string');
    }

    /**
     * @group domain
     */
    public function testTwoObjectsAreEqual()
    {
        $value = $this->faker->unique()->uuid;

        $a = new Uuid($value);
        $b = new Uuid($value);

        self::assertTrue($a->equals($b));
    }

    /**
     * @group domain
     */
    public function testTwoObjectsAreNotEqual()
    {
        $value1 = $this->faker->unique()->uuid;
        $value2 = $this->faker->unique()->uuid;

        $a = new Uuid($value1);
        $b = new Uuid($value2);

        self::assertFalse($a->equals($b));
    }
}

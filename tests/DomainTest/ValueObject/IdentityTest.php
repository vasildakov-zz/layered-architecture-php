<?php
namespace DomainTest\ValueObject;

use Domain\ValueObject\IdentityInterface;
use Domain\ValueObject\Identity;

class IdentityTest extends \PHPUnit_Framework_TestCase
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
        $value = $this->faker->unique()->uuid;

        self::assertInstanceOf(IdentityInterface::class, new Identity($value));
    }

    /**
     * @group domain
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage "some-invalid-uuid-string" is not a valid uuid
     */
    public function testConstructorThrowsAnException()
    {
        $uuid = new Identity('some-invalid-uuid-string');
    }

    /**
     * @group domain
     */
    public function testTwoObjectsAreEqual()
    {
        $value = $this->faker->unique()->uuid;

        $a = new Identity($value);
        $b = new Identity($value);

        self::assertTrue($a->equals($b));
    }

    /**
     * @group domain
     */
    public function testTwoObjectsAreNotEqual()
    {
        $a = new Identity($this->faker->unique()->uuid);
        $b = new Identity($this->faker->unique()->uuid);

        self::assertFalse($a->equals($b));
    }
}

<?php
namespace DomainTest\ValueObject;

use Faker\Provider\Uuid as UuidProvider;
use Domain\ValueObject\Uuid;

class UuidTest extends \PHPUnit_Framework_TestCase
{
    public function testObjectCanBeConstructedWithValidUuid1()
    {
        $value = UuidProvider::uuid();

        self::assertInstanceOf(Uuid::class, new Uuid($value));
    }


    public function testTwoObjectsAreEqual()
    {
        $value = UuidProvider::uuid();

        $a = new Uuid($value);
        $b = new Uuid($value);

        self::assertTrue($a->equals($b));
    }

    public function testTwoObjectsAreNotEqual()
    {
        $value1 = UuidProvider::uuid();
        $value2 = UuidProvider::uuid();

        $a = new Uuid($value1);
        $b = new Uuid($value2);

        self::assertFalse($a->equals($b));
    }
}

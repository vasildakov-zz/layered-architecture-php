<?php
namespace DomainTest\Entity;

use Domain\Entity;
use Domain\ValueObject;

class UserTest extends \PHPUnit_Framework_TestCase
{
    private $faker;

    public function setUp()
    {
        $this->faker = \Faker\Factory::create();

        //$this->id = $this->prophesize(ValueObject\UuidInterface::class)->reveal();
    }

    public function testObjectCanBeConstructed()
    {
        $id    = new ValueObject\Uuid($this->faker->unique()->uuid);
        $email = new ValueObject\Email($this->faker->unique()->email);
        $password = new ValueObject\HashedPassword($this->faker->unique()->sha256);

        $user = new Entity\User($id, $email, $password);

        self::assertInstanceOf(Entity\User::class, $user);
    }

    public function testObjectGetters()
    {
        $id    = new ValueObject\Uuid($this->faker->unique()->uuid);
        $email = new ValueObject\Email($this->faker->unique()->email);
        $password = new ValueObject\HashedPassword($this->faker->unique()->sha256);

        $user = new Entity\User($id, $email, $password);

        self::assertEquals($id, $user->getId());
        self::assertEquals($email, $user->getEmail());
    }
}

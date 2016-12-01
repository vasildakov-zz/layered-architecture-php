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
    }

    public function testObjectCanBeConstructed()
    {
        $id    = new ValueObject\Uuid($this->faker->unique()->uuid);
        $email = new ValueObject\Email($this->faker->unique()->email);

        $user = new Entity\User($id, $email);

        self::assertInstanceOf(Entity\User::class, $user);
    }

    public function testObjectGetters()
    {
        $id    = new ValueObject\Uuid($this->faker->unique()->uuid);
        $email = new ValueObject\Email($this->faker->unique()->email);

        $user = new Entity\User($id, $email);

        self::assertEquals($id, $user->getId());
        self::assertEquals($email, $user->getEmail());
    }
}

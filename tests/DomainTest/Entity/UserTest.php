<?php
namespace DomainTest\Entity;

use Domain\Entity\User;
use Domain\ValueObject\Uuid;
use Domain\ValueObject\Email;

class UserTest extends \PHPUnit_Framework_TestCase
{
    private $faker;

    public function setUp()
    {
        $this->faker = \Faker\Factory::create();
    }

    public function testObjectCanBeConstructed()
    {
        $id    = new Uuid($this->faker->unique()->uuid);
        $email = new Email($this->faker->unique()->email);

        $user = new User($id, $email);

        self::assertInstanceOf(User::class, $user);
    }

    public function testObjectGetters()
    {
        $id    = new Uuid($this->faker->unique()->uuid);
        $email = new Email($this->faker->unique()->email);

        $user = new User($id, $email);

        self::assertEquals($id, $user->getId());
        self::assertEquals($email, $user->getEmail());
    }
}

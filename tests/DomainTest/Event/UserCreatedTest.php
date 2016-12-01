<?php
namespace DomainTest\Entity;

use Domain\Entity;
use Domain\ValueObject;
use Domain\Event;

class UserCreatedTest extends \PHPUnit_Framework_TestCase
{
    private $faker;

    public function setUp()
    {
        $faker = \Faker\Factory::create();

        $this->uuid = $faker->unique()->uuid;
        $this->email = $faker->unique()->email;
        $this->password = $faker->unique()->sha256;

    }

    public function testObjectCanBeConstructedWithUser()
    {
        $id    = new ValueObject\Uuid($this->uuid);
        $email = new ValueObject\Email($this->email);
        $password = new ValueObject\HashedPassword($this->password);

        $event = new Event\UserCreated(new Entity\User($id, $email, $password));

        self::assertInstanceOf(Event\EventInteface::class, $event);

        self::assertEquals($id, $event->id());
        self::assertEquals($email, $event->email());
    }
}

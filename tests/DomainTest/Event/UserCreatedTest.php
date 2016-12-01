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
        $this->faker = \Faker\Factory::create();
    }

    public function testObjectCanBeConstructedWithUser()
    {
        $id    = new ValueObject\Uuid($this->faker->unique()->uuid);
        $email = new ValueObject\Email($this->faker->unique()->email);

        $event = new Event\UserCreated(new Entity\User($id, $email));

        self::assertInstanceOf(Event\EventInteface::class, $event);

        self::assertEquals($id, $event->id());
        self::assertEquals($email, $event->email());
    }
}

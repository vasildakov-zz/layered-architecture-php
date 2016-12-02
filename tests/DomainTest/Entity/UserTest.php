<?php
namespace DomainTest\Entity;

use Domain\Entity;
use Domain\ValueObject;

class UserTest extends \PHPUnit_Framework_TestCase
{
    private $id;
    private $email;
    private $hash;

    public function setUp()
    {
        $this->id    = $this->prophesize(ValueObject\Uuid::class)->reveal();
        $this->email = $this->prophesize(ValueObject\Email::class)->reveal();
        $this->hash  = $this->prophesize(ValueObject\HashedPassword::class)->reveal();
    }

    /**
     * @group domain
     */
    public function testObjectCanBeConstructed()
    {
        $user = new Entity\User($this->id, $this->email, $this->hash);

        self::assertInstanceOf(Entity\User::class, $user);
    }

    /**
     * @group domain
     */
    public function testObjectGetters()
    {
        $user = new Entity\User($this->id, $this->email, $this->hash);

        self::assertEquals($this->id, $user->getId());
        self::assertEquals($this->email, $user->getEmail());
        self::assertEquals($this->hash, $user->getPassword());
    }
}

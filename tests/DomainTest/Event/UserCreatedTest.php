<?php
namespace DomainTest\Event;

use Domain\Entity;
use Domain\ValueObject;
use Domain\Event;

class UserCreatedTest extends \PHPUnit_Framework_TestCase
{
    private $user;
    private $uuid;
    private $email;

    public function setUp()
    {
        $this->user = $this->getMockBuilder(Entity\UserInterface::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $this->uuid = $this->getMockBuilder(ValueObject\Uuid::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $this->email = $this->getMockBuilder(ValueObject\Email::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;
    }


    /**
     * @group domain
     */
    public function testObjectCanBeConstructedWithUser()
    {
        $this->user
             ->expects($this->once())
             ->method('getId')
             ->willReturn($this->uuid)
        ;

        $this->user
             ->expects($this->once())
             ->method('getEmail')
             ->willReturn($this->email)
        ;

        $event = new Event\UserCreated($this->user);

        self::assertInstanceOf(Event\EventInteface::class, $event);

        self::assertEquals($this->uuid, $event->id());
        self::assertEquals($this->email, $event->email());
    }
}

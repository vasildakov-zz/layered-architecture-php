<?php
namespace DomainTest\Event;

use Domain\Entity;
use Domain\ValueObject;
use Domain\Event;

class UserIsCreatedTest extends \PHPUnit_Framework_TestCase
{
    private $user;
    private $identity;
    private $email;

    protected function setUp()
    {
        $this->user = $this->getMockBuilder(Entity\UserInterface::class)
            ->setMethods(array ('getId', 'getEmail', 'setPassword', 'getPassword'))
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $this->identity = $this->getMockBuilder(ValueObject\IdentityInterface::class)
            ->setMethods(['equals'])
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $this->email = $this->getMockBuilder(ValueObject\EmailInterface::class)
            ->setMethods(['equals'])
            ->disableOriginalConstructor()
            ->getMock()
        ;
    }


    /**
     * @group domain
     */
    public function testObjectCanBeConstructedWithUser()
    {
        /* $this->user
             ->expects($this->once())
             ->method('getId')
             ->willReturn($this->identity)
        ;

        $this->user
             ->expects($this->once())
             ->method('getEmail')
             ->willReturn($this->email)
        ;

        $event = new Event\UserIsCreated($this->user);

        self::assertInstanceOf(Event\EventInteface::class, $event);

        self::assertEquals($this->identity, $event->id());
        self::assertEquals($this->email, $event->email()); */
    }
}

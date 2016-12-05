<?php
namespace DomainTest\Entity;

use Domain\Entity;
use Domain\ValueObject;

class UserTest extends \PHPUnit_Framework_TestCase
{
    private $identity;
    private $email;
    private $hash;

    protected function setUp()
    {
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

        $this->hash = $this->getMockBuilder(ValueObject\HashedPassword::class)
            //->setMethods(['__toString', 'equals'])
            ->disableOriginalConstructor()
            ->getMock()
        ;

    }

    /**
     * @group domain
     */
    public function testObjectCanBeConstructed()
    {
        $user = new Entity\User($this->identity, $this->email, $this->hash);

        self::assertInstanceOf(Entity\User::class, $user);
    }

    /**
     * @group domain
     */
    public function testObjectGetters()
    {
        /* $user = new Entity\User($this->id, $this->email, $this->hash);

        self::assertEquals($this->id, $user->getId());
        self::assertEquals($this->email, $user->getEmail());
        self::assertEquals($this->hash, $user->getPassword()); */
    }
}

<?php
namespace InfrastructureTest\Repository\Mock;

use Domain\Entity\UserInterface;
use Domain\ValueObject\IdentityInterface;
use Domain\Repository\UserRepositoryInterface;
use Infrastructure\Repository\Mock\UserRepository;

class UserRepositoryTest extends \PHPUnit_Framework_TestCase
{
    private $user;

    private $identity;

    protected function setUp()
    {
        $this->user = $this->getMockBuilder(UserInterface::class)
            ->setMethods(['getId', 'getEmail', 'setPassword', 'getPassword'])
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $this->identity = $this->getMockBuilder(IdentityInterface::class)
            ->setMethods(['equals'])
            ->disableOriginalConstructor()
            ->getMock()
        ;
    }


    /**
     * @group infrastructure
     */
    public function testCanBeConstructed()
    {
        self::assertInstanceOf(UserRepositoryInterface::class, new UserRepository());
    }


    /**
     * @group infrastructure
     */
    public function testCanSave()
    {
        $repository = new UserRepository();
        $repository->save($this->user);

        self::assertEquals(1, $repository->count());
    }


    /**
     * @group infrastructure
     */
    public function testCanFindOneUserById()
    {
        $this->user
             ->expects($this->exactly(2))
             ->method('getId')
             ->willReturn($this->identity)
        ;

        $this->identity
             ->expects($this->once())
             ->method('equals')
             ->with($this->identity)
             ->willReturn(true)
        ;

        $repository = new UserRepository();
        $repository->save($this->user);

        $user = $repository->find($this->identity);

        self::assertInstanceOf(User::class, $user);
    }

    /**
     * @group infrastructure
     */
    public function testCanReturnNullWhenUserNotFound()
    {
        $this->user
             ->expects($this->exactly(2))
             ->method('getId')
             ->willReturn($this->identity)
        ;

        $this->identity
             ->expects($this->once())
             ->method('equals')
             ->with($this->identity)
             ->willReturn(false)
        ;

        $repository = new UserRepository();
        $repository->save($this->user);

        self::assertNull($repository->find($this->identity));
    }
}

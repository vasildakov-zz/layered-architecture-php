<?php
namespace InfrastructureTest\ValueObject;

use Domain\Entity\User;
use Domain\ValueObject\Uuid;
use Domain\Repository\UserRepositoryInterface;
use Infrastructure\Repository\Mock\UserRepository;

class UserRepositoryTest extends \PHPUnit_Framework_TestCase
{
    private $user;

    private $uuid;

    protected function setUp()
    {
        $this->user = $this->getMockBuilder(User::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $this->uuid = $this->getMockBuilder(Uuid::class)
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
             ->willReturn($this->uuid)
        ;

        $this->uuid
             ->expects($this->once())
             ->method('equals')
             ->with($this->uuid)
             ->willReturn(true)
        ;

        $repository = new UserRepository();
        $repository->save($this->user);

        $user = $repository->find($this->uuid);

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
             ->willReturn($this->uuid)
        ;

        $this->uuid
             ->expects($this->once())
             ->method('equals')
             ->with($this->uuid)
             ->willReturn(false)
        ;

        $repository = new UserRepository();
        $repository->save($this->user);

        self::assertNull($repository->find($this->uuid));
    }
}

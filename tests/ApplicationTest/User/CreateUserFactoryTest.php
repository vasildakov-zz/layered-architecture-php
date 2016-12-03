<?php
namespace ApplicationTest\User;

use Interop\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

use Domain\Repository\UserRepositoryInterface;
use Domain\Service\HashingService;

use Application\User\CreateUserInterface;
use Application\User\CreateUserFactory;
use Application\User\CreateUser;

class CreateUserFactoryTest extends \PHPUnit_Framework_TestCase
{
    private $container;
    private $users;
    private $hasher;
    private $logger;

    protected function setUp()
    {
        $this->container = $this->getMockBuilder(ContainerInterface::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $this->users = $this->getMockBuilder(UserRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $this->hasher = $this->getMockBuilder(HashingService::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $this->logger = $this->getMockBuilder(LoggerInterface::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;
    }


    /**
     * @group application
     */
    public function testCanCreateService()
    {

        $this->container
            ->expects($this->at(0))
            ->method('get')
            ->with(UserRepositoryInterface::class)
            ->willReturn($this->users)
        ;


        $this->container
            ->expects($this->at(1))
            ->method('get')
            ->with(HashingService::class)
            ->willReturn($this->hasher)
        ;

        $this->container
            ->expects($this->at(2))
            ->method('get')
            ->with(LoggerInterface::class)
            ->willReturn($this->logger)
        ;

        $service = (new CreateUserFactory())($this->container);

        self::assertInstanceOf(CreateUserInterface::class, $service);
    }
}

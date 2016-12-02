<?php
namespace ApplicationTest\User;

use Psr\Log\LoggerInterface;

use Domain\Repository\UserRepositoryInterface;
use Domain\Service\IdentityGenerator;
use Domain\Service\HashingService;
use Domain\ValueObject\HashedPassword;

use Application\User\CreateUserInterface;
use Application\User\CreateUserRequest;
use Application\User\CreateUserResponse;
use Application\User\CreateUser;

class CreateUserTest extends \PHPUnit_Framework_TestCase
{
    private $users;
    private $generator;
    private $hasher;
    private $hash;
    private $logger;
    private $request;

    protected function setUp()
    {
        $this->users = $this->getMockBuilder(UserRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $this->generator = $this->getMockBuilder(IdentityGenerator::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $this->logger = $this->getMockBuilder(LoggerInterface::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $this->hasher = $this->getMockBuilder(HashingService::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $this->hash = $this->getMockBuilder(HashedPassword::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $this->request = $this->getMockBuilder(CreateUserRequest::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;
    }


    /**
     * @group application
     */
    public function testCanBeConstructed()
    {
        $service = new CreateUser(
            $this->users,
            $this->generator,
            $this->hasher,
            $this->logger
        );

        self::assertInstanceOf(CreateUserInterface::class, $service);
    }


    /**
     * @group application
     */
    public function testCanBeInvokedWithRequest()
    {
        $this->request
            ->expects($this->once())
            ->method('email')
            ->will($this->returnValue('vasildakov@gmail.com'))
        ;

        $this->request
            ->expects($this->once())
            ->method('password')
            ->will($this->returnValue('vasildakov'))
        ;

        $this->hasher
            ->expects($this->once())
            ->method('__invoke')
            ->with('vasildakov')
            ->will($this->returnValue($this->hash))
        ;

        $service = new CreateUser(
            $this->users,
            $this->generator,
            $this->hasher,
            $this->logger
        );

        $response = $service($this->request);

        self::assertInstanceOf(CreateUserResponse::class, $response);
    }
}

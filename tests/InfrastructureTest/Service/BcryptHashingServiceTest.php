<?php
namespace DomainTest\ValueObject;

use Domain\ValueObject\Password;
use Domain\ValueObject\HashedPassword;
use Domain\Service\HashingService;
use Infrastructure\Service\BcryptHashingService;

class BcryptHashingServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @group infrastructure
     */
    public function testCanBeConstructed()
    {
        self::assertInstanceOf(HashingService::class, (new BcryptHashingService()));
    }

    /**
     * @group infrastructure
     */
    public function testCanHashPassword()
    {
        $password = new Password('rasmuslerdorf');

        $hash = (new BcryptHashingService())($password);

        self::assertInstanceOf(HashedPassword::class, $hash);
        self::assertTrue(\password_verify('rasmuslerdorf', $hash));
    }
}

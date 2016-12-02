<?php
namespace InfrastructureTest\ValueObject;

use Domain\ValueObject\Uuid;
use Domain\Service\IdentityGenerator;
use Infrastructure\Service\IdentityGeneratorService;

class IdentityGeneratorServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @group infrastructure
     */
    public function testCanBeConstructed()
    {
        self::assertInstanceOf(IdentityGenerator::class, (new IdentityGeneratorService()));
    }

    /**
     * @group infrastructure
     */
    public function testCanGenerateIdentity()
    {
        self::assertInstanceOf(Uuid::class, (new IdentityGeneratorService())());
    }
}

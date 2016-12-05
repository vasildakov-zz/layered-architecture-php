<?php
namespace Presentation\Api\Action;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception;

use Infrastructure\Repository\Mock\UserRepository;

/**
 * Class SignUpInputFilterFactory
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class SignUpFilterFactory
{
    /**
     * @param ContainerInterface $container
     * @return CreateUser
     */
    public function __invoke(ContainerInterface $container)
    {
        return new SignUpFilter();
    }
}

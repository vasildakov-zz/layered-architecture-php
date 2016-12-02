<?php
namespace Application\User;

/**
 * Interface CreateUserInterface
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface CreateUserInterface
{
    /**
     * @param  CreateUserRequest  $request
     * @return CreateUserResponse $response
     */
    public function __invoke(CreateUserRequest $request): CreateUserResponse;
}

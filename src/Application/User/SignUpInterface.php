<?php
namespace Application\User;

/**
 * Interface SignUpInterface
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface SignUpInterface
{
    /**
     * @param  SignUpRequest  $request
     * @return SignUpResponse $response
     */
    public function __invoke(SignUpRequest $request): SignUpResponse;
}

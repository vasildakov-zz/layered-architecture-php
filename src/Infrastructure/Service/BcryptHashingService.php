<?php
/**
 * @see  http://php.net/password_hash
 * @see  http://stackoverflow.com/questions/4795385/how-do-you-use-bcrypt-for-hashing-passwords-in-php
 */
namespace Infrastructure\Service;

use Domain\Service\HashingService;
use Domain\ValueObject\Password;
use Domain\ValueObject\HashedPassword;

// $2y$10$nOUIs5kJ7naTuTFkBy1veuK0kSxUFXfuaOKdOKf9xYT0KKIGSJwFa

class BcryptHashingService implements HashingService
{
    public function __invoke(Password $password): HashedPassword
    {
        $hash = password_hash($password, PASSWORD_BCRYPT, $options);

        return new HashedPassword($hash);
    }
}

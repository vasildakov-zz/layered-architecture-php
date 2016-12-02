<?php
declare(strict_types = 1);
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

    /**
     * @param  \Domain\ValueObject\Password          $password
     * @return \Domain\ValueObject\HashedPassword
     */
    public function __invoke(Password $password): HashedPassword
    {
        if (!extension_loaded('mcrypt')) {
            throw new \RuntimeException("mcrypt extension is not loaded");
        }

        $options = [
            'cost' => 11,
            'salt' => \mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ];

        $hash = \password_hash( (string)$password, PASSWORD_BCRYPT, $options);

        return new HashedPassword($hash);
    }
}

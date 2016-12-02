<?php
declare(strict_types = 1);

namespace Infrastructure\Service;

use Domain\Service\IdentityGenerator;
use Domain\ValueObject\Uuid;

/**
 * Generates pseudo-random universally unique identifier (UUID) v4
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class IdentityGeneratorService implements IdentityGenerator
{
    /**
     * @see http://www.ietf.org/rfc/rfc4122.txt  A Universally Unique IDentifier (UUID) URN Namespace
     * @return \Domain\ValueObject\Uuid
     */
    public function __invoke() : Uuid
    {
        $uuid = sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );

        return new Uuid($uuid);
    }
}

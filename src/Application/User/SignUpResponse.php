<?php
declare(strict_types = 1);

namespace Application\User;

use Domain\Entity\User;

/**
 * Class SignUpResponse
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class SignUpResponse implements \JsonSerializable
{
    /**
     * @var string $user
     */
    private $id;

    /**
     * @param \Domain\Entity\User $user
     */
    public function __construct(User $user)
    {
        $this->id = (string) $user->getId();
    }

    /**
     * @return string uuid
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * Specify data which should be serialized to JSON
     *
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * @link   http://php.net/manual/en/jsonserializable.jsonserialize.php
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id()
        ];
    }
}

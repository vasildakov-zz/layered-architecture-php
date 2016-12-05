<?php
declare(strict_types = 1);

namespace Application\User;

/**
 * Class CreateUserRequest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class SignUpRequest implements \JsonSerializable
{
    /**
     * @var string $email
     */
    private $email;

    /**
     * @var string $password
     */
    private $password;

    /**
     * Constructor
     *
     * @param id $email
     * @param string $email
     * @param string $password
     */
    public function __construct(string $email, string $password)
    {
        $this->email = $email;

        $this->password = $password;
    }


    /**
     * @return string $email
     */
    public function email()
    {
        return $this->email;
    }


    /**
     * @return string $password
     */
    public function password()
    {
        return $this->password;
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
            'email' => $this->email(),
            'password' => $this->password(),
        ];
    }
}

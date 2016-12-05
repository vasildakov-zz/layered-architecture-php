<?php
declare(strict_types = 1);

namespace Application\Ping;

/**
 * Class PingResponse
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class PingResponse implements \JsonSerializable
{
    private $time;

    public function __construct($time)
    {
        $this->time = $time;
    }

    public function time()
    {
        return $this->time;
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
            'ack' => $this->time()
        ];
    }
}

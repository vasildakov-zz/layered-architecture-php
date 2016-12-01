<?php
declare(strict_types = 1);

namespace Domain\ValueObject;

/**
 * Class Email
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Email implements EmailInterface, \JsonSerializable
{
    /**
     * @var string
     */
    private $value;

    /**
     * @param string $value
     */
    public function __construct($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException(sprintf('"%s" is not a valid email', $value));
        }

        $this->value = $value;
    }

    public function equals(EmailInterface $other)
    {
        return strtolower((string) $this) === strtolower((string) $other);
    }

    public function __toString()
    {
        return (string) $this->value;
    }

    public function jsonSerialize()
    {
        return [];
    }
}
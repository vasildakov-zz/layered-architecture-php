<?php
declare(strict_types = 1);

namespace Domain\ValueObject;

/**
 * Class Email
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class Email implements EmailInterface, \JsonSerializable
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
        return strtolower($this->getValue()) === strtolower($other->getValue());
    }

    public function getValue()
    {
        return $this->value;
    }

    public function __toString()
    {
        return (string) $this->getValue();
    }

    public function jsonSerialize()
    {
        return [
            'email' => $this->getValue()
        ];
    }
}

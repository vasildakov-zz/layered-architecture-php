<?php
declare(strict_types = 1);

namespace Domain\ValueObject;

/**
 * Class PasswordHash
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class PasswordHash
{
    /**
     * @var string
     */
    private $value;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}

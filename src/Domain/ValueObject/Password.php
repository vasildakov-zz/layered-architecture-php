<?php
declare(strict_types = 1);

namespace Domain\ValueObject;

/**
 * Class Password
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class Password
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


    public function __toString()
    {
        return $this->getValue();
    }
}

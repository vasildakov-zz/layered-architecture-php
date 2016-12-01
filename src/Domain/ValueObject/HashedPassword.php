<?php
declare(strict_types = 1);

namespace Domain\ValueObject;

/**
 * Class HashedPassword
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class HashedPassword
{
    const REGEX_BCRYPT = '^\$2y\$.{56}$';

    
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

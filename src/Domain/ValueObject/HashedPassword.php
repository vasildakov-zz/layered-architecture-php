<?php
declare(strict_types = 1);

namespace Domain\ValueObject;

/**
 * Class HashedPassword
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class HashedPassword
{
    const REGEX_BCRYPT = '/^\$2y\$.{56}$/';

    /**
     * @var string
     */
    private $value;

    /**
     * @param string $value
     * @throws Exception
     */
    public function __construct($value)
    {
        if(!\preg_match(self::REGEX_BCRYPT, $value, $matches)) {
            throw new \Exception("Invalid hash");
        }

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

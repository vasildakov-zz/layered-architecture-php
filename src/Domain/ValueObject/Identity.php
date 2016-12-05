<?php
declare(strict_types = 1);

namespace Domain\ValueObject;

use Ramsey\Uuid\Uuid;

/**
 * Class Identity
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class Identity implements IdentityInterface
{
    /**
     * Matches Uuid's versions 1 to 5.
     */
    const REGEX_UUID = '/^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$/';

    /**
     * @var string
     */
    private $value;

    /**
     * @param string $value
     */
    public function __construct($value = null)
    {
        if (null !== $value) {
            if (!\preg_match(self::REGEX_UUID, $value)) {
                throw new \InvalidArgumentException(sprintf('"%s" is not a valid uuid', $value));
            }
        }

        $this->value = \strval($value);
    }

    public static function generate()
    {
        return new static(Uuid::uuid4());
    }


    public function getValue()
    {
        return $this->value;
    }

    public function equals(IdentityInterface $other)
    {
        return strtolower((string) $this) === strtolower((string) $other);
    }

    public function __toString()
    {
        return $this->getValue();
    }
}

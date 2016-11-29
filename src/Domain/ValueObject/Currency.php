<?php
declare(strict_types = 1);

namespace Domain\ValueObject;

final class Currency implements CurrencyInterface, \JsonSerializable
{
    /**
     * @var array
     */
    private static $currencies = [
        'GBP' => [
            'display_name' => 'Pound Sterling',
            'numeric_code' => 826,
            'default_fraction_digits' => 2,
            'sub_unit' => 100,
        ],
        'EUR' => [
            'display_name' => 'Euro',
            'numeric_code' => 978,
            'default_fraction_digits' => 2,
            'sub_unit' => 100,
        ],
        'USD' => [
            'display_name' => 'US Dollar',
            'numeric_code' => 840,
            'default_fraction_digits' => 2,
            'sub_unit' => 100,
        ],
    ];

    /**
     * @var string
     */
    private $currencyCode;


    /**
     * @param  string $currencyCode
     * @throws \SebastianBergmann\Money\InvalidArgumentException
     */
    public function __construct($currencyCode)
    {
        if (!isset(self::$currencies[$currencyCode])) {
            $currencyCode = strtoupper($currencyCode);
        }
        if (!isset(self::$currencies[$currencyCode])) {
            throw new InvalidArgumentException(
                sprintf('Unknown currency code "%s"', $currencyCode)
            );
        }
        $this->currencyCode = $currencyCode;
    }

    /**
     * Returns the ISO 4217 currency code of this currency.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->currencyCode;
    }
}

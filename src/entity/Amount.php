<?php

namespace cryptoscan\entity;

use cryptoscan\exception\InvalidArgumentException;

/**
 * Сущность суммы
 *
 * Class Amount
 * @package cryptoscan\entity
 */
class Amount
{
    /**
     * @var float
     */
    private $value;

    /**
     * @param $value
     */
    public function __construct($value)
    {
        $value = round($value, 6);
        self::assertValue($value);

        $this->value = $value;
    }

    /**
     * @param $value
     * @return void
     */
    private static function assertValue($value)
    {
        if (is_numeric($value) === false) {
            throw new InvalidArgumentException("Amount must be numeric");
        }

        if ($value <= 0) {
            throw new InvalidArgumentException('Amount should be more than 0');
        }
    }

    /**
     * @return float
     */
    public function asNumeric()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->value;
    }
}

<?php

namespace cryptoscan\entity;

use cryptoscan\exception\InvalidArgumentException;

/**
 * Сущность дополнительной информации
 *
 * Class Metadata
 * @package cryptoscan\entity
 */
class Metadata
{
    /** @var int */
    const MAX_LENGTH = 2000;

    /**
     * @var string
     */
    private $value;

    /**
     * @param string $value
     */
    public function __construct($value)
    {
        self::asserValue($value);
        $this->value = $value;
    }

    /**
     * @param $value
     * @return void
     */
    private static function asserValue($value)
    {
        if (
            empty($value) === false &&
            mb_strlen($value) >= self::MAX_LENGTH
        ) {
            throw new InvalidArgumentException('Metadata should be less than 2000 characters');
        }
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}

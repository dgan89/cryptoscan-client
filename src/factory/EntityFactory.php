<?php
/**
 * Created by PhpStorm.
 * User: itily
 * Date: 04.06.2023
 * Time: 19:46
 */

namespace cryptoscan\factory;

use cryptoscan\entity\Amount;
use cryptoscan\entity\Metadata;

/**
 * Создание сущности
 *
 * Class EntityFactory
 * @package \cryptoscan\factory
 */
class EntityFactory
{
    /**
     * EntityFactory constructor.
     */
    private function __construct()
    {
    }

    /**
     * Сумма
     *
     * @param Amount|float|int $value
     * @return Amount
     */
    public static function amount($value)
    {
        return ($value instanceof Amount) === true ?
            $value :
            new Amount($value);
    }

    /**
     * Дополнительная информация
     *
     * @param Metadata|float|int $value
     * @return Metadata
     */
    public static function metadata($value)
    {
        return ($value instanceof Metadata) === true ?
            $value :
            new Metadata($value);
    }
}

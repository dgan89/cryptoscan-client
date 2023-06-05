<?php
/**
 * Created by PhpStorm.
 * User: itily
 * Date: 05.06.2023
 * Time: 12:22
 */

namespace cryptoscan\factory;

use cryptoscan\contract\FailureInterface;
use cryptoscan\exception\AuthFailureException;
use cryptoscan\exception\ClientExceptionInterface;
use cryptoscan\exception\ClientFailureException;
use cryptoscan\exception\InvalidDataException;

/**
 * Создание исключения по ответу
 *
 * Class ResponseExceptionFactory
 * @package \cryptoscan\factory
 */
class ResponseExceptionFactory
{
    /**
     * ResponseExceptionFactory constructor.
     */
    private function __construct()
    {
    }

    /**
     * По ответу от сервера
     *
     * @param FailureInterface $failure
     * @return ClientExceptionInterface
     */
    public static function createByFailure(FailureInterface $failure)
    {
        switch ($failure->getStatus()) {
            case 400:
                return new InvalidDataException($failure);
            case 401:
                return new AuthFailureException($failure);
            default:
                return new ClientFailureException($failure);
        }
    }
}

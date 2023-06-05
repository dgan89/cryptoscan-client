<?php
/**
 * Created by PhpStorm.
 * User: itily
 * Date: 04.06.2023
 * Time: 21:13
 */

namespace cryptoscan\contract;

/**
 * Информация по пользователю
 *
 * Class UserDetailInterface
 * @package cryptoscan\contract
 */
interface UserDetailInterface
{
    /**
     * Успешно
     *
     * @return bool
     */
    public function isSuccess();

    /**
     * ID пользователя
     *
     * @return int
     */
    public function getId();

    /**
     * Статус
     *
     * @return string
     */
    public function getStatus();

    /**
     * Баланс
     *
     * @return string
     */
    public function getBalance();
}
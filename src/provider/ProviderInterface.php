<?php
/**
 * Created by PhpStorm.
 * User: itily
 * Date: 04.06.2023
 * Time: 18:00
 */

namespace cryptoscan\provider;

use cryptoscan\contract\AuthCredentialsInterface;
use cryptoscan\contract\InvoiceCreatedInterface;

/**
 * Провайдер данных
 *
 * Class DataProviderInterface
 * @package cryptoscan\provider
 */
interface ProviderInterface
{
    /**
     * Установка данных авторизации
     *
     * @param AuthCredentialsInterface $credentials
     * @return InvoiceCreatedInterface
     */
    public function setAuthCredentials(AuthCredentialsInterface $credentials);
}
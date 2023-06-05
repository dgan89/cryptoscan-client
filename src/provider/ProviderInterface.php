<?php
/**
 * Created by PhpStorm.
 * User: itily
 * Date: 04.06.2023
 * Time: 18:00
 */

namespace cryptoscan\provider;

use cryptoscan\command\InvoiceCreate;
use cryptoscan\command\WidgetCreate;
use cryptoscan\contract\AuthCredentialsInterface;
use cryptoscan\contract\InvoiceCreatedInterface;
use cryptoscan\contract\InvoiceListInterface;
use cryptoscan\contract\UserDetailInterface;
use cryptoscan\contract\WidgetCreatedInterface;

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

    /**
     * Создание инвойса
     *
     * @param InvoiceCreate $command
     * @return InvoiceCreatedInterface
     */
    public function invoiceCreate(InvoiceCreate $command);

    /**
     * Создание виджета
     *
     * @param WidgetCreate $command
     * @return WidgetCreatedInterface
     */
    public function widgetCreate(WidgetCreate $command);

    /**
     * Просмотр инвойса
     *
     * @param int $id
     * @return WidgetCreatedInterface
     */
    public function invoiceDetail($id);

    /**
     * Поиск инвойсов
     *
     * @param string $query
     * @return InvoiceListInterface
     */
    public function invoiceSearch($query);

    /**
     * Информация по пользователю
     *
     * @return UserDetailInterface
     */
    public function userDetail();
}
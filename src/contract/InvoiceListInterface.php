<?php
/**
 * Created by PhpStorm.
 * User: itily
 * Date: 04.06.2023
 * Time: 20:49
 */

namespace cryptoscan\contract;

/**
 * Список инвойсов
 *
 * Class InvoiceListInterface
 * @package cryptoscan\contract
 */
interface InvoiceListInterface
{
    /**
     * Успешно
     *
     * @return bool
     */
    public function isSuccess();

    /**
     * Инвойсы
     *
     * @return InvoiceListItemInterface[]
     */
    public function getItems();
}
<?php
/**
 * Created by PhpStorm.
 * User: itily
 * Date: 04.06.2023
 * Time: 16:50
 */

namespace cryptoscan\contract;

/**
 * Детальная информация по инвойсу
 *
 * Class InvoiceDetailedInterface
 * @package cryptoscan\contract
 */
interface InvoiceDetailedInterface
{
    /**
     * Успешно
     *
     * @return bool
     */
    public function isSuccess();

    /**
     * ID инвойса
     *
     * @return int
     */
    public function getId();

    /**
     * ID транзакции в сети
     *
     * @return string|null
     */
    public function getTransactionId();

    /**
     * Итоговая сумма к оплате
     *
     * @return float
     */
    public function getFinalAmount();

    /**
     * Кошелёк, куда нужно произвести оплату
     *
     * @return string
     */
    public function getWallet();

    /**
     * Кошелёк, с которого произведена оплата
     *
     * @return string|null
     */
    public function getPayerWallet();

    /**
     * Запрашиваемая сумма к оплате
     *
     * @return float
     */
    public function getRequestedAmount();

    /**
     * @return string
     */
    public function getStatus();

    /**
     * Статус платежа
     *
     * @return string
     */
    public function getClientReferenceId();

    /**
     * Дополнительная информация
     *
     * @return string|null
     */
    public function getMetadata();

    /**
     * Время создания платежа
     *
     * @return int
     */
    public function getCreatedAt();

    /**
     * Дата обнаружения оплаты
     *
     * @return int|null
     */
    public function getPaidAt();

    /**
     * Время, когда платеж станет просрочен
     *
     * @return int
     */
    public function getExpireAt();
}

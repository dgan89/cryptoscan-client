<?php
/**
 * Created by PhpStorm.
 * User: itily
 * Date: 05.06.2023
 * Time: 13:49
 */

namespace cryptoscan\webhook;

/**
 * Оплаченный платеж
 *
 * Class WebHookPaid
 * @package cryptoscan\webhook
 */
class WebHookPaid extends BaseWebHook
{
    /**
     * @var string
     */
    protected $payerWallet;

    /**
     * @var string
     */
    protected $transactionId;

    /**
     * @var int
     */
    protected $paidAt;

    /**
     * @return string
     */
    public function getPayerWallet()
    {
        return $this->payerWallet;
    }

    /**
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @return int
     */
    public function getPaidAt()
    {
        return $this->paidAt;
    }
}
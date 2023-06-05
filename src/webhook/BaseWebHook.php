<?php
/**
 * Created by PhpStorm.
 * User: itily
 * Date: 05.06.2023
 * Time: 13:52
 */

namespace cryptoscan\webhook;

use cryptoscan\entity\BaseObject;

/**
 * Базовые данные по платежу
 *
 * Class BaseWebHook
 * @package cryptoscan\webhook
 */
abstract class BaseWebHook extends BaseObject
{
    /**
     * @var string
     */
    protected $eventType;

    /**
     * @var int
     */
    protected $retryCount;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $wallet;

    /**
     * @var float
     */
    protected $finalAmount;

    /**
     * @var float
     */
    protected $requestedAmount;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $clientReferenceId;

    /**
     * @var string|null
     */
    protected $metadata;

    /**
     * @var int
     */
    protected $createdAt;

    /**
     * @var int
     */
    protected $expireAt;

    /**
     * @return string
     */
    public function getEventType()
    {
        return $this->eventType;
    }

    /**
     * @return int
     */
    public function getRetryCount()
    {
        return $this->retryCount;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getWallet()
    {
        return $this->wallet;
    }

    /**
     * @return float
     */
    public function getFinalAmount()
    {
        return $this->finalAmount;
    }

    /**
     * @return float
     */
    public function getRequestedAmount()
    {
        return $this->requestedAmount;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getClientReferenceId()
    {
        return $this->clientReferenceId;
    }

    /**
     * @return string|null
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @return int
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return int
     */
    public function getExpireAt()
    {
        return $this->expireAt;
    }
}
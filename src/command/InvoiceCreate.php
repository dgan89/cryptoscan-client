<?php

namespace cryptoscan\command;

use cryptoscan\entity\Amount;
use cryptoscan\entity\Metadata;
use cryptoscan\factory\EntityFactory;

/**
 * Создание Инвойса
 *
 * Class InvoiceCreate
 * @package cryptoscan\command
 */
class InvoiceCreate
{
    /**
     * Сумма к оплате
     *
     * @var Amount
     */
    private $amount;

    /**
     * Номер платежа в системе
     *
     * @var string
     */
    private $clientReferenceId;

    /**
     * Произвольная строка
     *
     * @var Metadata|null
     */
    private $metadata;

    /**
     * @param float|Amount $amount
     * @param string $clientReferenceId
     */
    public function __construct($amount, $clientReferenceId)
    {
        $this->amount = EntityFactory::amount($amount);
        $this->clientReferenceId = $clientReferenceId;
    }

    /**
     * @return Amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getClientReferenceId()
    {
        return $this->clientReferenceId;
    }

    /**
     * @return Metadata|null
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param string|Metadata|null $metadata
     * @return self
     */
    public function setMetadata($metadata)
    {
        if (empty($metadata) === false) {
            $this->metadata = EntityFactory::metadata($metadata);
        }

        return $this;
    }
}

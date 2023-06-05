<?php

namespace cryptoscan\command;

use cryptoscan\entity\Amount;
use cryptoscan\factory\EntityFactory;

/**
 * Создание Виджета для Инвойса
 *
 * Class WidgetCreate
 * @package cryptoscan\command
 */
class WidgetCreate
{
    /**
     * Сумма платежа
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
     * Описание платежа
     *
     * @var string|null
     */
    private $widgetDescription;

    /**
     * URL, куда перекинет пользователя после оплаты
     *
     * @var string|null
     */
    private $backUrl;

    /**
     * 	URL, куда перекинет пользователя в случае отмены оплаты
     *
     * @var string|null
     */
    private $cancelUrl;

    /**
     * @param $amount
     * @param $clientReferenceId
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
     * @return string|null
     */
    public function getWidgetDescription()
    {
        return $this->widgetDescription;
    }

    /**
     * @return string|null
     */
    public function getBackUrl()
    {
        return $this->backUrl;
    }

    /**
     * @return string|null
     */
    public function getCancelUrl()
    {
        return $this->cancelUrl;
    }

    /**
     * @param string|null $widgetDescription
     * @return WidgetCreate
     */
    public function setWidgetDescription($widgetDescription)
    {
        $this->widgetDescription = $widgetDescription;
        return $this;
    }

    /**
     * @param string|null $backUrl
     * @return WidgetCreate
     */
    public function setBackUrl($backUrl)
    {
        $this->backUrl = $backUrl;
        return $this;
    }

    /**
     * @param string|null $cancelUrl
     * @return WidgetCreate
     */
    public function setCancelUrl($cancelUrl)
    {
        $this->cancelUrl = $cancelUrl;
        return $this;
    }
}
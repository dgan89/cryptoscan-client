<?php

namespace cryptoscan\response;

use cryptoscan\contract\WidgetCreatedInterface;


/**
 *
 *
 * Class WidgetCreatedResponse
 * @package cryptoscan\response
 */
class WidgetCreatedResponse extends BaseResponse implements WidgetCreatedInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $finalAmount;

    /**
     * @var string
     */
    protected $wallet;

    /**
     * @var int
     */
    protected $expireAt;

    /**
     * @var string
     */
    protected $widgetUrl;

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function getFinalAmount()
    {
        return $this->finalAmount;
    }

    /**
     * @inheritDoc
     */
    public function getWallet()
    {
        return $this->wallet;
    }

    /**
     * @inheritDoc
     */
    public function getExpireAt()
    {
        return $this->expireAt;
    }

    /**
     * @inheritDoc
     */
    public function getWidgetUrl()
    {
        return $this->widgetUrl;
    }
}
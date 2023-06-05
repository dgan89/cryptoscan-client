<?php
/**
 * Created by PhpStorm.
 * User: itily
 * Date: 05.06.2023
 * Time: 14:00
 */

namespace cryptoscan\factory;

use cryptoscan\entity\WebHookMessage;
use cryptoscan\exception\InvalidArgumentException;
use cryptoscan\webhook\BaseWebHook;
use cryptoscan\webhook\WebHookExpired;
use cryptoscan\webhook\WebHookPaid;

/**
 * Создание события платежа WebHook
 *
 * Class WebHookFactory
 * @package \cryptoscan\factory
 */
class WebHookFactory
{
    /**
     * WebHookFactory constructor.
     */
    private function __construct()
    {
    }

    /**
     * Создание по сообщению
     *
     * @param WebHookMessage $message
     * @return BaseWebHook
     */
    public static function create(WebHookMessage $message)
    {
        $data = $message->getData();

        switch ($message->getEventType()) {
            case WebHookMessage::EVENT_PAID:
                return new WebHookPaid($data);
            case WebHookMessage::EVENT_EXPIRED:
                return new WebHookExpired($data);
            default:
                throw new InvalidArgumentException("EventType is not valid");
        }
    }
}

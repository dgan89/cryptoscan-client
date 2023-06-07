<?php
/**
 * Created by PhpStorm.
 * User: itily
 * Date: 05.06.2023
 * Time: 14:00
 */

namespace cryptoscan\factory;

use cryptoscan\exception\InvalidArgumentException;
use cryptoscan\webhook\WebHookMessage;
use cryptoscan\webhook\WebHookExpiredMessage;
use cryptoscan\webhook\WebHookPaidMessage;
use cryptoscan\webhook\WebHookDataInterface;

/**
 * Создание события платежа WebHook
 *
 * Class WebHookMessageFactory
 * @package \cryptoscan\factory
 */
class WebHookMessageFactory
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
     * @param WebHookDataInterface $request
     * @return WebHookMessage
     */
    public static function createByRequest(WebHookDataInterface $request)
    {
        $data = $request->getData();

        switch ($request->getEventType()) {
            case WebHookMessage::EVENT_PAID:
                return new WebHookPaidMessage($data);
            case WebHookMessage::EVENT_EXPIRED:
                return new WebHookExpiredMessage($data);
            default:
                throw new InvalidArgumentException("EventType is not valid");
        }
    }
}

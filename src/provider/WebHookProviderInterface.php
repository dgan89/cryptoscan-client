<?php
/**
 * Created by PhpStorm.
 * User: itily
 * Date: 07.06.2023
 * Time: 10:01
 */

namespace cryptoscan\provider;

use cryptoscan\webhook\WebHookMessage;
use cryptoscan\webhook\WebHookDataInterface;

/**
 * WebHook провайдер
 *
 * Class WebHookProviderInterface
 * @package cryptoscan\provider
 */
interface WebHookProviderInterface extends ProviderInterface
{
    /**
     * Обработка сообщения
     * @return WebHookMessage
     */
    public function messageHandler(WebHookDataInterface $request);
}
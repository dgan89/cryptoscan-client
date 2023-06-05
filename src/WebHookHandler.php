<?php
/**
 * Created by PhpStorm.
 * User: itily
 * Date: 05.06.2023
 * Time: 13:29
 */

namespace cryptoscan;

use cryptoscan\entity\WebHookMessage;
use cryptoscan\factory\WebHookFactory;
use cryptoscan\webhook\BaseWebHook;

/**
 * Обработка сообщения WebHook
 *
 * Class WebHookHandler
 * @package cryptoscan
 */
class WebHookHandler
{
    /**
     * @var WebHookMessage
     */
    private $message;

    /**
     * @param WebHookMessage $message
     */
    public function __construct(WebHookMessage $message)
    {
        $this->message = $message;
    }

    /**
     * @return BaseWebHook
     */
    public function handle()
    {
        return WebHookFactory::create($this->message);
    }
}
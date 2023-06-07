<?php

namespace cryptoscan\webhook;

use cryptoscan\entity\Authorize;

/**
 * Полученные данные по WebHook
 */
interface WebHookDataInterface
{
    /**
     * Данные авторизации
     *
     * @return Authorize
     */
    public function getAuthorize();

    /**
     * Данные запроса
     *
     * @return array
     */
    public function getData();

    /**
     * Тип события
     *
     * @return string|null
     */
    public function getEventType();
}
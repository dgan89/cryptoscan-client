<?php

namespace cryptoscan\request;


/**
 * Запрос на просмотр информации по пользователю
 *
 * Class UserDetailRequest
 * @package cryptoscan\request
 */
class UserDetailRequest implements RequestInterface
{
    /**
     * @inheritDoc
     */
    public function getMethod()
    {
        return "GET";
    }

    /**
     * @inheritDoc
     */
    public function getUri()
    {
        return "user";
    }

    /**
     * @inheritDoc
     */
    public function getBody()
    {
        return [];
    }
}

<?php

namespace cryptoscan\request;

/**
 * HTTP запрос
 */
interface HttpRequestInterface
{
    /**
     * Метод запроса
     *
     * @return string
     */
    public function getMethod();

    /**
     * Uri
     *
     * @return string
     */
    public function getUri();

    /**
     * Данные запроса
     *
     * @return array
     */
    public function getBody();
}
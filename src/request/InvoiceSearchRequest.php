<?php

namespace cryptoscan\request;


/**
 * Запрос на поиск инвойсов
 *
 * Class InvoiceSearchRequest
 * @package cryptoscan\request
 */
class InvoiceSearchRequest implements HttpRequestInterface
{
    /**
     * Значение для поиска инвойсов
     *
     * @var string|int
     */
    private $query;

    /**
     * @param string|int $query
     */
    public function __construct($query)
    {
        $this->query = $query;
    }

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
        return "invoice?query={$this->query}";
    }

    /**
     * @inheritDoc
     */
    public function getBody()
    {
        return [];
    }
}

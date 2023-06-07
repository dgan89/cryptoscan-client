<?php

namespace cryptoscan\request;


/**
 * Запрос на просмотр инвойса
 *
 * Class InvoiceDetailRequest
 * @package cryptoscan\request
 */
class InvoiceDetailRequest implements HttpRequestInterface
{
    /**
     * ID инвойса
     *
     * @var int
     */
    private $id;

    /**
     * @param int $id
     */
    public function __construct($id)
    {
        $this->id = $id;
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
        return "invoice/{$this->id}";
    }

    /**
     * @inheritDoc
     */
    public function getBody()
    {
        return [];
    }
}

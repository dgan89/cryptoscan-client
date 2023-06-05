<?php

namespace cryptoscan\request;

use cryptoscan\command\InvoiceCreate;

/**
 * Запрос на создание инвойса
 *
 * Class InvoiceCreateRequest
 * @package cryptoscan\request
 */
class InvoiceCreateRequest implements RequestInterface
{
    /**
     * @var InvoiceCreate
     */
    private $command;

    /**
     * @param InvoiceCreate $command
     */
    public function __construct(InvoiceCreate $command)
    {
        $this->command = $command;
    }

    /**
     * @inheritDoc
     */
    public function getMethod()
    {
        return "POST";
    }

    /**
     * @inheritDoc
     */
    public function getUri()
    {
        return "invoice";
    }

    /**
     * @inheritDoc
     */
    public function getBody()
    {
        $command = $this->command;

        return [
            "amount" => $command
                ->getAmount()
                ->asNumeric(),
            "client_reference_id" => $command->getClientReferenceId(),
            "metadata" => $command->getMetadata(),
        ];
    }
}

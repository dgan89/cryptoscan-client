<?php

namespace cryptoscan\request;

use cryptoscan\command\WidgetCreate;

/**
 * Запрос на создание виджета
 *
 * Class WidgetCreateRequest
 * @package cryptoscan\request
 */
class WidgetCreateRequest implements RequestInterface
{
    /**
     * @var WidgetCreate
     */
    private $command;

    /**
     * @param WidgetCreate $command
     */
    public function __construct(WidgetCreate $command)
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
        return "invoice/widget";
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
            "widget_description" => $command->getWidgetDescription(),
            "back_url" => $command->getBackUrl(),
            "cancel_url" => $command->getCancelUrl(),
        ];
    }
}

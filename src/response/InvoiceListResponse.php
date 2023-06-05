<?php

namespace cryptoscan\response;

use cryptoscan\contract\InvoiceListInterface;
use cryptoscan\contract\InvoiceListItemInterface;

/**
 * @inheritDoc
 *
 * Class InvoiceListResponse
 * @package cryptoscan\response
 */
class InvoiceListResponse extends BaseResponse implements InvoiceListInterface
{
    /**
     * @var InvoiceListItemInterface[]
     */
    protected $items = [];

    /**
     * @inheritDoc
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param array[] $items
     */
    protected function setData($items)
    {
        $this->items = array_map(
            static function (array $item) {
                return new InvoiceListItemResponse($item);
            },
            $items
        );
    }
}

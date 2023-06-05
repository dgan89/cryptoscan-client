<?php

namespace cryptoscan\response;

use cryptoscan\contract\FailureInterface;

/**
 * @inheritDoc
 *
 * Class FailureResponse
 * @package cryptoscan\response
 */
class FailureResponse extends BaseResponse implements FailureInterface
{
    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $message;

    /**
     * @var int|null
     */
    protected $code;

    /**
     * @var int|null
     */
    protected $status;

    /**
     * @var string[]
     */
    protected $errors = [];

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @inheritDoc
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @inheritDoc
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @inheritDoc
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
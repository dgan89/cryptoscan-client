<?php
/**
 * Created by PhpStorm.
 * User: itily
 * Date: 05.06.2023
 * Time: 12:40
 */

namespace cryptoscan\exception;

use cryptoscan\contract\FailureInterface;
use RuntimeException;

/**
 * Ошибка данных
 *
 * Class ClientFailureException
 * @package cryptoscan\exception
 */
class ClientFailureException extends RuntimeException implements ClientExceptionInterface
{
    /**
     * @var FailureInterface
     */
    private $response;

    /**
     * @param FailureInterface $failure
     */
    public function __construct(FailureInterface $failure)
    {
        parent::__construct($failure->getMessage(), $failure->getCode());
        $this->response = $failure;
    }

    /**
     * @return FailureInterface
     */
    public function getResponse()
    {
        return $this->response;
    }
}
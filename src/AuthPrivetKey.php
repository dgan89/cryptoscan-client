<?php

namespace cryptoscan;

use cryptoscan\contract\AuthCredentialsInterface;

/**
 * Авторизация по приватному ключу
 *
 * Class AuthPrivetKey
 * @package cryptoscan
 */
class AuthPrivetKey implements AuthCredentialsInterface
{
    /**
     * Приватный ключ
     *
     * @var string
     */
    private $privateKey;

    /**
     * Публичный ключ
     *
     * @var string
     */
    private $publicKey;

    /**
     * @param string $publicKey
     * @param string $privateKey
     */
    public function __construct($publicKey, $privateKey)
    {
        $this->privateKey = $privateKey;
        $this->publicKey = $publicKey;
    }

    /**
     * @inheritDoc
     */
    public function getHttpHeaderName()
    {
        return 'private-key';
    }

    /**
     * @inheritDoc
     */
    public function getAuthCredentials(array $requestData)
    {
        return $this->privateKey;
    }

    /**
     * @inheritDoc
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }
}

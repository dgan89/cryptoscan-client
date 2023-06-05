<?php

namespace cryptoscan;

use cryptoscan\contract\AuthCredentialsInterface;

/**
 * Авторизация по сигнатуре подписи
 *
 * Class AuthSignature
 * @package cryptoscan
 */
class AuthSignature implements AuthCredentialsInterface
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
        return 'signature';
    }

    /**
     * @inheritDoc
     */
    public function getAuthCredentials(array $requestData)
    {
        $privateKey = $this->privateKey;
        $requestBody = array_merge($requestData, [
            'api_key' => $this->publicKey,
        ]);
        ksort($requestBody);

        return hash_hmac('sha256', http_build_query($requestBody), $privateKey);
    }

    /**
     * @inheritDoc
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }
}
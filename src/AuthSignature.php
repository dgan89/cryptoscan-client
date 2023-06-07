<?php

namespace cryptoscan;

use cryptoscan\contract\AuthCredentialsInterface;
use cryptoscan\entity\Authorize;

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
    public function getAuthType()
    {
        return 'signature';
    }

    /**
     * @inheritDoc
     */
    public function getAuthCredentials(array $data)
    {
        $privateKey = $this->privateKey;
        $requestBody = array_merge($data, [
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

    /**
     * @inheritDoc
     */
    public function isAccessConfirmed(Authorize $authorize, array $data)
    {
        return
            $authorize->getPublicKey() === $this->getPublicKey() &&
            $authorize->getCredentials() === $this->getAuthCredentials($data);
    }
}
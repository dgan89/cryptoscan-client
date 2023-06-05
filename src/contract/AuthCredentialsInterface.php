<?php

namespace cryptoscan\contract;


/**
 * Авторизация
 */
interface AuthCredentialsInterface
{
    /**
     * HTTP заголовок авторизации
     *
     * @return string
     */
    public function getHttpHeaderName();

    /**
     * Публичный ключ
     *
     * @return string
     */
    public function getPublicKey();

    /**
     * Данные авторизации
     *
     * @param array $requestData
     * @return string
     */
    public function getAuthCredentials(array $requestData);
}
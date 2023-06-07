<?php

namespace cryptoscan\contract;


use cryptoscan\entity\Authorize;

/**
 * Авторизация
 */
interface AuthCredentialsInterface
{
    /**
     * Тип авторизации
     *
     * @return string
     */
    public function getAuthType();

    /**
     * Публичный ключ
     *
     * @return string
     */
    public function getPublicKey();

    /**
     * Данные авторизации
     *
     * @param array $data
     * @return string
     */
    public function getAuthCredentials(array $data);

    /**
     * Проверка доступа
     *
     * @param Authorize $authorize
     * @param array $data
     * @return bool
     */
    public function isAccessConfirmed(Authorize $authorize, array $data);
}
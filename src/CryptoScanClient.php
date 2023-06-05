<?php

namespace cryptoscan;

use cryptoscan\command\InvoiceCreate;
use cryptoscan\command\WidgetCreate;
use cryptoscan\contract\InvoiceCreatedInterface;
use cryptoscan\contract\InvoiceDetailedInterface;
use cryptoscan\contract\InvoiceListInterface;
use cryptoscan\contract\UserDetailInterface;
use cryptoscan\contract\WidgetCreatedInterface;
use cryptoscan\factory\ProviderFactory;
use cryptoscan\contract\AuthCredentialsInterface;
use cryptoscan\provider\ProviderInterface;

/**
 * Клиент работы с сервисом CryptoScan
 *
 * Class CryptoScanClient
 * @package cryptoscan
 *
 * @method InvoiceCreatedInterface invoiceCreate(InvoiceCreate $command) Создание Инвойса
 * @method WidgetCreatedInterface widgetCreate(WidgetCreate $command) Создание Виджета для Инвойса
 * @method InvoiceDetailedInterface invoiceDetail($id) Просмотр Инвойса
 * @method InvoiceListInterface invoiceSearch($query) Поиск Инвойса
 * @method UserDetailInterface userDetail() Просмотр информации о пользователе
 */
class CryptoScanClient
{
    /**
     * Данные авторизации
     *
     * @var AuthCredentialsInterface
     */
    private $authCredentials;

    /**
     * Провайдер данных
     *
     * @var ProviderInterface
     */
    private $provider;

    /**
     * CryptoScan constructor.
     * @param AuthCredentialsInterface $authCredentials
     * @param ProviderInterface|null $provider
     */
    public function __construct(
        AuthCredentialsInterface $authCredentials,
        ProviderInterface        $provider = null
    )
    {
        $this->authCredentials = $authCredentials;
        $this->setProvider($provider);
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return $this
            ->provider
            ->$name(...$arguments);
    }

    /**
     * Установка провайдера данных
     *
     * @return void
     */
    private function setProvider(ProviderInterface $provider = null)
    {
        $provider = $provider ?: ProviderFactory::http();
        $provider->setAuthCredentials($this->authCredentials);

        $this->provider = $provider;
    }
}

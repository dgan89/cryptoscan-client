<?php
/**
 * Created by PhpStorm.
 * User: itily
 * Date: 04.06.2023
 * Time: 18:11
 */

namespace cryptoscan\factory;

use cryptoscan\provider\GuzzleHttpClient;
use cryptoscan\provider\HttpClientInterface;
use cryptoscan\provider\HttpClientProvider;

/**
 * Создание провайдера данных
 *
 * Class ProviderFactory
 * @package \cryptoscan\factory
 */
class ProviderFactory
{
    /**
     * ProviderFactory constructor.
     */
    private function __construct()
    {
    }

    /**
     * HTTP провайдер данных
     *
     * @param HttpClientInterface|null $client
     * @return HttpClientProvider
     */
    public static function http(HttpClientInterface $client = null)
    {
        $client = $client ?: new GuzzleHttpClient();

        return new HttpClientProvider($client);
    }
}

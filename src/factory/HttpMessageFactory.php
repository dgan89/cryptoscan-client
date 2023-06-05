<?php
/**
 * Created by PhpStorm.
 * User: itily
 * Date: 04.06.2023
 * Time: 16:47
 */

namespace cryptoscan\factory;

use cryptoscan\command\InvoiceCreate;
use cryptoscan\command\WidgetCreate;
use cryptoscan\contract\InvoiceCreatedInterface;
use cryptoscan\contract\InvoiceDetailedInterface;
use cryptoscan\contract\InvoiceListInterface;
use cryptoscan\contract\UserDetailInterface;
use cryptoscan\contract\WidgetCreatedInterface;
use cryptoscan\request\InvoiceCreateRequest;
use cryptoscan\request\InvoiceDetailRequest;
use cryptoscan\request\InvoiceSearchRequest;
use cryptoscan\request\RequestInterface;
use cryptoscan\request\UserDetailRequest;
use cryptoscan\request\WidgetCreateRequest;
use cryptoscan\response\InvoiceCreatedResponse;
use cryptoscan\response\InvoiceDetailedResponse;
use cryptoscan\response\InvoiceListResponse;
use cryptoscan\response\UserDetailedResponse;
use cryptoscan\response\WidgetCreatedResponse;
use Psr\Http\Message\ResponseInterface;

/**
 * Создание HTTP запросов/ответов
 *
 * Class HttpMessageFactory
 * @package \cryptoscan\factory
 */
class HttpMessageFactory
{
    /**
     * RequestFactory constructor.
     */
    private function __construct()
    {
    }

    /**
     * Запрос на создание инвойса
     *
     * @param InvoiceCreate $command
     * @return RequestInterface
     */
    public static function invoiceCreate(InvoiceCreate $command)
    {
        return new InvoiceCreateRequest($command);
    }

    /**
     * Ответ созданного инвойса
     *
     * @param ResponseInterface $response
     * @return InvoiceCreatedInterface
     */
    public static function invoiceCreated(ResponseInterface $response)
    {
        return InvoiceCreatedResponse::instanceByResponse($response);
    }

    /**
     * Запрос на создание виджета
     *
     * @param WidgetCreate $command
     * @return RequestInterface
     */
    public static function widgetCreate(WidgetCreate $command)
    {
        return new WidgetCreateRequest($command);
    }

    /**
     * Созданный виджет
     *
     * @param ResponseInterface $response
     * @return WidgetCreatedInterface
     */
    public static function widgetCreated(ResponseInterface $response)
    {
        return WidgetCreatedResponse::instanceByResponse($response);
    }

    /**
     * Запрос просмотра инвойса
     *
     * @param int $id
     * @return RequestInterface
     */
    public static function invoiceDetail($id)
    {
        return new InvoiceDetailRequest($id);
    }

    /**
     * Информация по инвойсу
     *
     * @param ResponseInterface $response
     * @return InvoiceDetailedInterface
     */
    public static function invoiceDetailed(ResponseInterface $response)
    {
        return InvoiceDetailedResponse::instanceByResponse($response);
    }

    /**
     * Запрос поиска инвойсов
     *
     * @param string|int $query
     * @return RequestInterface
     */
    public static function invoiceSearch($query)
    {
        return new InvoiceSearchRequest($query);
    }

    /**
     * Список найденных инвойсов
     *
     * @param ResponseInterface $response
     * @return InvoiceListInterface
     */
    public static function invoiceList(ResponseInterface $response)
    {
        return InvoiceListResponse::instanceByResponse($response);
    }

    /**
     * Запрос детальной информации по пользователю
     *
     * @return RequestInterface
     */
    public static function userDetail()
    {
        return new UserDetailRequest();
    }

    /**
     * Детальная информация по пользователю
     *
     * @param ResponseInterface $response
     * @return UserDetailInterface
     */
    public static function userDetailed(ResponseInterface $response)
    {
        return UserDetailedResponse::instanceByResponse($response);
    }

    /**
     * Детальная информация по пользователю
     *
     * @param ResponseInterface $response
     * @return UserDetailInterface
     */
    public static function failure(ResponseInterface $response)
    {
        return UserDetailedResponse::instanceByResponse($response);
    }
}

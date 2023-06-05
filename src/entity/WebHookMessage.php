<?php
/**
 * Created by PhpStorm.
 * User: itily
 * Date: 05.06.2023
 * Time: 13:30
 */

namespace cryptoscan\entity;

use cryptoscan\exception\InvalidArgumentException;

/**
 * WebHook сообщение от сервиса
 *
 * Class WebHookMessage
 * @package cryptoscan\entity
 */
class WebHookMessage
{
    /** @var string Оплачен */
    const EVENT_PAID = 'paid';

    /** @var string Просрочен */
    const EVENT_EXPIRED = 'expired';

    /**
     * @var string
     */
    private $eventType;

    /**
     * @var int
     */
    private $retryCount;

    /**
     * @var array
     */
    private $data;

    /**
     * @param string $eventType
     * @param int $retryCount
     * @param array $data
     */
    public function __construct($eventType, $retryCount, array $data = [])
    {
        self::assertEventType($eventType);
        self::assertRetryCount($retryCount);
        self::assertData($data);

        $this->eventType = $eventType;
        $this->retryCount = $retryCount;
        $this->data = $data;
    }

    /**
     * @param $value
     * @return void
     */
    private static function assertEventType($value)
    {
        if (empty($value) === true) {
            throw new InvalidArgumentException("EventType can not to be empty");
        }

        $typeList = [
            self::EVENT_PAID,
            self::EVENT_EXPIRED,
        ];

        if (in_array($value, $typeList) === false) {
            throw new InvalidArgumentException("EventType is not valid");
        }
    }

    /**
     * @param $value
     * @return void
     */
    private static function assertRetryCount($value)
    {
        if (is_integer($value) === false) {
            throw new InvalidArgumentException("RetryCount must be integer");
        }
    }

    /**
     * @param array $data
     * @return void
     */
    private static function assertData(array $data)
    {
        if (empty($data) === true) {
            throw new InvalidArgumentException("Data can not to be empty");
        }
    }

    /**
     * Создание по HTTP запросу
     *
     * @param array $requestData
     * @return WebHookMessage
     */
    public static function instanceFromRequest(array $requestData)
    {
        $eventType = array_key_exists('event_type', $requestData) === true ? $requestData['event_type'] : null;
        $retryCount = array_key_exists('retry_count', $requestData) === true ? $requestData['retry_count'] : null;
        $data = array_key_exists('data', $requestData) === true ? $requestData['data'] : [];

        return new self($eventType, $retryCount, $data);
    }

    /**
     * @return string
     */
    public function getEventType()
    {
        return $this->eventType;
    }

    /**
     * @return int
     */
    public function getRetryCount()
    {
        return $this->retryCount;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }
}
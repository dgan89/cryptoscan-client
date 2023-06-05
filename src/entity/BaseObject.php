<?php

namespace cryptoscan\entity;

use Psr\Http\Message\ResponseInterface;

/**
 * Базовая сущность
 *
 * Class BaseObject
 * @package cryptoscan\response
 */
abstract class BaseObject
{
    /**
     * @param array $attributes
     */
    public function __construct(array $attributes)
    {
        $this->setAttributes($attributes);
    }

    /**
     * Создание по ответу от сервера
     *
     * @param ResponseInterface $response
     * @return static
     */
    public static function instanceByResponse(ResponseInterface $response)
    {
        $json = $response
            ->getBody()
            ->getContents();

        return static::instanceByJson($json);
    }

    /**
     * Создание по JSON
     *
     * @param $json
     * @return static
     */
    public static function instanceByJson($json)
    {
        $decode = json_decode($json, true);

        return new static($decode);
    }

    /**
     * Установка атрибутов
     *
     * @param array $attributes
     * @return void
     */
    private function setAttributes($attributes)
    {
        $attributes = array_filter(
            $attributes,
            static function ($value) {
                return $value !== null;
            }
        );

        foreach ($attributes as $attribute => $value) {
            $this->setAttribute($attribute, $value);
        }
    }

    /**
     * Установка атрибута
     *
     * @param $attribute
     * @param $value
     * @return void
     */
    private function setAttribute($attribute, $value)
    {
        $attribute = ucwords(str_replace('_', ' ', $attribute));
        $attribute = str_replace(' ', '', $attribute);
        $attribute = lcfirst($attribute);
        $setter = 'set' . ucfirst($attribute);

        if (method_exists($this, $setter) === true) {
            $this->$setter($value);
        } elseif (property_exists($this, $attribute) === true) {
            $this->$attribute = $value;
        } elseif (is_array($value) === true) {
            $this->setAttributes($value);
        }
    }
}

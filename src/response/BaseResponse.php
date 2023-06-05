<?php
/**
 * Created by PhpStorm.
 * User: itily
 * Date: 05.06.2023
 * Time: 11:34
 */

namespace cryptoscan\response;

use cryptoscan\entity\BaseObject;

/**
 * Ответ с подтверждением
 *
 * Class ConfirmedBaseResponse
 * @package cryptoscan\response
 */
abstract class BaseResponse extends BaseObject
{
    /**
     * Успешно
     *
     * @var bool
     */
    protected $success;

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return $this->success;
    }
}

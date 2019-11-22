<?php
/**
 * User: 林松
 * Date: 2019/11/1
 * Time: 17:44
 */

namespace App\Exceptions\Common;

/**
 * 表单验证错误异常
 * Class ValidateRequestException
 * @package App\Exceptions\Common
 */
class ValidateRequestException extends BaseException
{
    protected $code = 422;

    public function __construct($data = [], $message = '参数验证失败', \Exception $previous = null)
    {

        $data = [
            'msg' => $message,
            'status' => false,
            'code' => $this->code,
            'data' => $data,
            'time' => time()
        ];
        parent::__construct($data, json_encode($data), 200);
    }
}

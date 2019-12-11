<?php
/**
 * User: 林松
 * Date: 2019/11/1
 * Time: 17:44
 */

namespace App\Exceptions\Common;

/**
 * 表单验证错误异常
 * Class ValidateRequestApiException
 * @package App\Exceptions\Common
 * User: 林松
 * Date: 2019/12/11
 * Time: 上午 9:31
 */
class ValidateRequestApiException extends ApiException
{
    protected $code = 422;

    public function __construct($data = [], $message = '参数验证失败', \Exception $previous = null)
    {
        $data = getJsonData($data, $message, false, $this->code);

        parent::__construct($data, $message, 200);
    }
}

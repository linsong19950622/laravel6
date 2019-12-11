<?php
/**
 * User: 林松
 * Date: 2019/12/11
 * Time: 上午 11:18
 */

namespace App\Exceptions\Common;

/**
 * 未登录异常类
 * Class UnauthorizedApiException
 * @package App\Exceptions\Common
 * User: 林松
 * Date: 2019/12/11
 * Time: 下午 1:57
 */
class UnauthorizedApiException extends LoginFailApiException
{
    public function __construct($data = [], $message = '未登录', \Exception $previous = null)
    {
        parent::__construct($data, $message, $previous);
    }
}

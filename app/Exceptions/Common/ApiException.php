<?php
/**
 * User: Administrator
 * Date: 2019/12/11
 * Time: 上午 9:29
 */

namespace App\Exceptions\Common;

/**
 * api异常基类
 * Class ApiException
 * @package App\Exceptions\Common
 * User: 林松
 * Date: 2019/12/11
 * Time: 上午 11:58
 */
class ApiException extends BaseException
{
    public function __construct($data = [], $message = null, $code = 500, \Exception $previous = null)
    {
        parent::__construct($data, $message, $code);
    }
}

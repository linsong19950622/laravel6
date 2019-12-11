<?php
/**
 * User: Administrator
 * Date: 2019/12/10
 * Time: 下午 5:59
 */

namespace App\Exceptions\Common;

/**
 * 登录失败异常
 * Class LoginFailApiException
 * @package App\Exceptions\Common
 * User: 林松
 * Date: 2019/12/11
 * Time: 上午 9:31
 */
class LoginFailApiException extends ApiException
{
    protected $code = 401;

    public function __construct($data = [], $message = '登录失败', \Exception $previous = null)
    {
        $data = getJsonData($data, $message, false, $this->code);

        parent::__construct($data, $message, 200);
    }
}

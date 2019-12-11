<?php
/**
 * User: 林松
 * Date: 2019/11/1
 * Time: 17:47
 */

namespace App\Exceptions\Common;

use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * 基础异常类
 * Class BaseException
 * @package App\Exceptions\Common
 */
class BaseException extends HttpException
{
    public $data = [];

    public function __construct($data = [], $message = null, $code = 500, \Exception $previous = null)
    {
        $this->data = $data;
        parent::__construct($code, $message, $previous, [], $code);
    }

    public function getData()
    {
        return $this->data;
    }
}

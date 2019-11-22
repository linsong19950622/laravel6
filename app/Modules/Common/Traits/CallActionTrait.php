<?php
/**
 * User: 林松
 * Date: 2019/11/1
 * Time: 17:27
 */

namespace App\Modules\Common\Traits;

trait CallActionTrait
{
    /**
     * 重写 框架callAction方法，引入initialize初始化方法
     * @param $method
     * @param $parameters
     * @return mixed
     * User: 林松    Date: 2019/11/1 17:30
     */
    public function callAction($method, $parameters)
    {
        if (method_exists($this, 'initialize')) {
            $response = call_user_func([$this, 'initialize']);
            if (!is_null($response)) {
                return $response;
            }
        }

        return call_user_func_array([$this, $method], $parameters);
    }
}

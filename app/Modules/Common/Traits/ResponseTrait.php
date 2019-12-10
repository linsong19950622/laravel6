<?php

/**
 * User: 林松
 * Date: 2019/11/19
 * Time: 15:51
 */

namespace App\Modules\Common\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseTrait
{
    /**
     * 返回json格式数据响应
     * @param $data
     * @param string $msg
     * @param bool $status
     * @param int $code
     * @return JsonResponse
     * User: 林松    Date: 2019/12/10
     */
    public function jsonResult($data, $msg = '操作成功！', $status = true, $code = 200)
    {
        return new JsonResponse(getJsonData($data, $msg, $status, $code));
    }
}

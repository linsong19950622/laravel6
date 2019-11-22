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
    public function jsonResult($data, $msg = '操作成功！', $status = true, $code = 200)
    {
        return new JsonResponse([
            'msg' => $msg,
            'status' => $status,
            'code' => $code,
            'data' => $data,
            'time' => time()
        ]);
    }
}

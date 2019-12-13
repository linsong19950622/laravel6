<?php
/**
 * User: 林松
 * Date: 2019/10/31
 * Time: 15:49
 */

namespace App\Modules\Api\Controllers;

use App\Modules\Api\Services\IndexService;
use App\Modules\Common\Rules\SensitiveWordRule;

class IndexController extends BaseController
{
    private $service;

    public function __construct(IndexService $service)
    {
        $this->service = $service;
    }

    /**
     * 首页
     * @OA\Get(
     *     path="/",
     *     operationId="1",
     *     tags={"index"},
     *     summary="首页",
     *     description="首页",
     *     security={
     *          {"Bearer":{}}
     *      },
     *     @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\Schema(
     *             type="array",
     *             example={"code":200,"msg":"获取域名信息成功！","data":{"id":1,"keyword":"xmisp.com","...":"..."}}
     *         )
     *     ),
     * )
     * @return \Illuminate\Http\JsonResponse
     * User: 林松    Date: 2019/12/13
     */
    public function getIndex()
    {
        $result = $this->service->getIndex();

        return $this->jsonResult($result);
    }
}

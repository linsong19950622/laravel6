<?php

namespace App\Modules\Api\Controllers;

use App\Modules\Common\Controller;

/**
 * @OA\Info(
 *     version="3.0",
 *     title="OpenApi API文档管理中心",
 *     description="已开放接口，使用说明及请求操作",
 *     @OA\Contact(
 *         name="林松",
 *     )
 * ),
 * @OA\Server(
 *     url="/api"
 * ),
 * @OA\SecurityScheme(
 *     securityScheme="Bearer",
 *     type="apiKey",
 *     in="query",
 *     name="token"
 * )
 * @OA\Tag(
 *     name="register",
 *     description="用户注册",
 * )
 * @OA\Tag(
 *     name="login",
 *     description="用户登录",
 * )
 * @OA\Tag(
 *     name="index",
 *     description="首页",
 * )
 */
class BaseController extends Controller
{

}

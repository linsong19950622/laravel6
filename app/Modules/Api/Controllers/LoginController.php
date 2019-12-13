<?php
/**
 * User: Administrator
 * Date: 2019/12/9
 * Time: 下午 2:26
 */

namespace App\Modules\Api\Controllers;


use App\Modules\Api\Services\LoginService;
use Illuminate\Http\Request;

class LoginController extends BaseController
{
    private $service;

    public function __construct(LoginService $service)
    {
        $this->service = $service;
    }

    public function validateForm()
    {
        return [
            'login' => [
                'rules' => [
                    'username' => config('rule.username'),
                    'password' => config('rule.password'),
                ],
            ]
        ];
    }

    /**
     * 用户登录
     * @OA\Post(
     *     path="/login/login",
     *     operationId="1",
     *     tags={"login"},
     *     summary="用户登录",
     *     description="执行用户登录",
     *     @OA\Parameter(
     *         name="username",
     *         description="用户名",
     *         required=true,
     *         in="query",
     *         @OA\Schema(
     *              type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="password",
     *         description="密码",
     *         required=true,
     *         in="query",
     *         @OA\Schema(
     *              type="string"
     *         )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="successful operation"
     *     ),
     * )
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * User: 林松    Date: 2019/12/13
     */
    public function login(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');

        $result = $this->service->login($username, $password);

        return $this->jsonResult($result);
    }

    /**
     * 用户退出
     * @OA\Get(
     *     path="/login/logout",
     *     operationId="1",
     *     tags={"login"},
     *     summary="用户退出",
     *     description="执行用户退出",
     *     security={
     *          {"Bearer":{}}
     *      },
     *     @OA\Response(
     *          response=200,
     *          description="successful operation"
     *     ),
     * )
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * User: 林松    Date: 2019/12/13
     */
    public function logout(Request $request)
    {
        $this->service->logout($request->get('token'));

        return $this->jsonResult([], trans('tips.logout'));
    }
}

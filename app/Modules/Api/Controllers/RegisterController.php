<?php
/**
 * User: 林松
 * Date: 2019/12/11
 * Time: 上午 10:30
 */

namespace App\Modules\Api\Controllers;


use App\Modules\Api\Services\RegisterService;
use Illuminate\Http\Request;

class RegisterController extends BaseController
{
    private $service;

    public function __construct(RegisterService $service)
    {
        $this->service = $service;
    }

    public function validateForm()
    {
        return [
            'register' => [
                'rules' => [
                    'username' => array_merge(config('rule.username'), ['unique:user']),
                    'mobile_phone' => array_merge(config('rule.mobile_phone'), ['unique:user']),
                    'password' => config('rule.password'),
                    'password_confirmation' => array_merge(config('rule.password'), ['same:password']),
                ]
            ]
        ];
    }

    /**
     * 用户注册
     * @OA\Post(
     *     path="/register/register",
     *     operationId="1",
     *     tags={"register"},
     *     summary="用户注册",
     *     description="注册一个新用户",
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
     *         name="mobile_phone",
     *         description="手机号",
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
     *     @OA\Parameter(
     *         name="password_confirmation",
     *         description="确认密码",
     *         required=true,
     *         in="query",
     *         @OA\Schema(
     *              type="string"
     *         )
     *     ),
     *    @OA\Response(
     *         response=200,
     *         description="successful operation"
     *     ),
     * )
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * User: 林松    Date: 2019/12/13
     */
    public function register(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        $mobilePhone = $request->get('mobile_phone');

        $this->service->register($username, $mobilePhone, $password);
        $result = $this->service->login($username);

        return $this->jsonResult($result);
    }
}

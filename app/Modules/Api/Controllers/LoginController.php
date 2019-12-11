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

    public function login(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');

        $result = $this->service->login($username, $password);

        return $this->jsonResult($result);
    }

    public function logout(Request $request)
    {
        $this->service->logout($request->get('token'));

        return $this->jsonResult([], trans('tips.logout'));
    }
}

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
                    'username' => [
                        config('rule.username'),
                        'unique:user'
                    ],
                    'mobile_phone' => [
                        config('rule.mobile_phone'),
                        'unique:user'
                    ],
                    'password' => config('rule.password'),
                    'password_confirmation' => [
                        config('rule.password'),
                        'same:password'
                    ]
                ]
            ]
        ];
    }

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

<?php
/**
 * User: Administrator
 * Date: 2019/12/9
 * Time: 下午 2:26
 */

namespace App\Modules\Admin\Controllers;


use App\Modules\Admin\Services\RegisterService;
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
                        'unique:admin'
                    ],
                    'mobile_phone' => config('rule.mobile_phone'),
                    'password' => config('rule.password'),
                    'password_confirmation' => [
                        config('rule.password'),
                        'same:password'
                    ]
                ]
            ]
        ];
    }

    public function index(Request $request)
    {
        return $this->view('auth.register');
    }

    public function register(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        $mobilePhone = $request->get('mobile_phone');
        $this->service->register($username, $mobilePhone, $password);

        return redirect()->route('admin.login.index');
    }

    public function passwordForget()
    {

    }
}

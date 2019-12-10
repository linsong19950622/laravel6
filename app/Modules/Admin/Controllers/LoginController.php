<?php
/**
 * User: Administrator
 * Date: 2019/12/9
 * Time: 下午 2:26
 */

namespace App\Modules\Admin\Controllers;


use App\Modules\Admin\Services\LoginService;
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

    public function index()
    {
        return $this->view('auth.login');
    }

    public function login(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        $rememberMe = $request->get('remember_me', false);

        if ($rememberMe) {
            $rememberMe = true;
        }

        $this->service->login($username, $password, $rememberMe);

        return redirect()->route('admin.index');
    }

    public function logout()
    {
        $this->service->logout();
        return redirect()->route('admin.login.index');
    }
}

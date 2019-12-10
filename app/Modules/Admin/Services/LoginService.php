<?php
/**
 * User: Administrator
 * Date: 2019/12/9
 * Time: 下午 5:30
 */

namespace App\Modules\Admin\Services;


use App\Modules\Common\BaseService;
use App\Repository\AdminRepository;
use Illuminate\Validation\ValidationException;

class LoginService extends BaseService
{
    protected $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function login($username, $password, $rememberMe)
    {
        $admin = $this->adminRepository->findAdminByUsername($username);

        if (empty($admin)) {
            throw ValidationException::withMessages([
                'username' => trans('tips.username.not_exist')
            ]);
        }

        $status = $this->guard()->attempt([
        'username' => $username,
        'password' => $password
    ], $rememberMe);

        if (!$status) {
            throw ValidationException::withMessages([
                'username' => trans('tips.username_password.fail')
            ]);
        }
    }

    public function logout()
    {
        $this->guard()->logout();
    }

}

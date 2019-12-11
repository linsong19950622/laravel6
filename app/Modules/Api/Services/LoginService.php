<?php
/**
 * User: Administrator
 * Date: 2019/12/9
 * Time: 下午 5:30
 */

namespace App\Modules\Api\Services;


use App\Exceptions\Common\LoginFailApiException;
use App\Modules\Common\BaseService;
use App\Repository\UserRepository;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginService extends BaseService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login($username, $password)
    {
        $user = $this->userRepository->findUserByUsername($username);
        if (empty($user)) {
            throw new LoginFailApiException([
                'username' => trans('tips.username.not_exist')
            ]);
        }

        $token = JWTAuth::attempt([
            'username' => $username,
            'password' => $password
        ]);
        if (!$token) {
            throw new LoginFailApiException([
                'username' => trans('tips.username_password.fail')
            ]);
        }

        return ['token' => $token];
    }

    public function logout($token)
    {
        JWTAuth::invalidate($token);
    }

}

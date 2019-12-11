<?php
/**
 * User: 林松
 * Date: 2019/12/11
 * Time: 上午 10:31
 */

namespace App\Modules\Api\Services;


use App\Exceptions\Common\LoginFailApiException;
use App\Modules\Common\BaseService;
use App\Repository\UserRepository;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterService extends BaseService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register($username, $mobilePhone, $password)
    {
        $this->userRepository->createUser($username, $mobilePhone, $password);
    }

    public function login($username)
    {
        $user = $this->userRepository->findUserByUsername($username);

        if (empty($user)) {
            throw new LoginFailApiException([], trans('tips.register.fail'));
        }
        $token = JWTAuth::fromUser($user);

        return ['token' => $token];
    }
}

<?php
/**
 * User: Administrator
 * Date: 2019/12/9
 * Time: 下午 4:04
 */

namespace App\Repository;


use App\Models\User;

class UserRepository
{

    /**
     * 密码加密
     * @param $password
     * @return string
     * User: 林松    Date: 2019/12/11
     */
    public function hashPassword($password)
    {
        return bcrypt($password);
    }

    /**
     * 创建用户
     * @param $username
     * @param $mobilePhone
     * @param $password
     * @return mixed
     * User: 林松    Date: 2019/12/11
     */
    public function createUser($username, $mobilePhone, $password)
    {
        return User::create([
            'username' => $username,
            'mobile_phone' => $mobilePhone,
            'password' => self::hashPassword($password),
        ]);
    }

    /**
     * 获取用户信息-用户名
     * @param $username
     * @return mixed
     * User: 林松    Date: 2019/12/11
     */
    public function findUserByUsername($username)
    {
        return User::where('username', $username)->first();
    }
}

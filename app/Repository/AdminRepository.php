<?php
/**
 * User: Administrator
 * Date: 2019/12/9
 * Time: 下午 4:04
 */

namespace App\Repository;


use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminRepository
{

    public function hashPassword($password)
    {
        return Hash::make($password);
    }

    public function hashCheck($password, $hashPassword)
    {
        return Hash::check($password, $hashPassword);
    }

    public function createAdminUser($username, $mobilePhone, $password)
    {
        return Admin::create([
            'username' => $username,
            'mobile_phone' => $mobilePhone,
            'password' => self::hashPassword($password),
        ]);
    }

    public function findAdminByUsername($username)
    {
        return Admin::where('username', $username)->first();
    }
}

<?php
/**
 * User: Administrator
 * Date: 2019/12/10
 * Time: 上午 11:57
 */

namespace App\Modules\Common;


use Illuminate\Support\Facades\Auth;

class BaseService
{
    public function guard()
    {
        $module = strtolower(getCurrentModuleName());
        return Auth::guard($module);
    }
}

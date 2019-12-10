<?php

namespace App\Modules\Admin\Controllers;

use App\Modules\Common\Controller;
use Illuminate\Validation\ValidationException;

class BaseController extends Controller
{
    /**
     * web请求 验证规则，失败返回
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * User: 林松    Date: 2019/12/9
     */
    public function throwValidationException(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw ValidationException::withMessages($validator->errors()->getMessages());
    }
}

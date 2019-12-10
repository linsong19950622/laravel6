<?php
/**
 * User: Administrator
 * Date: 2019/12/9
 * Time: 下午 2:12
 */

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Admin extends BaseModel implements AuthenticatableContract
{
    use Authenticatable;
}

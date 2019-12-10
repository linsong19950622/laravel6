<?php
/**
 * User: Administrator
 * Date: 2019/12/5
 * Time: 下午 4:24
 */

namespace App\Modules\Admin\Controllers\Rbac;


use App\Models\Permission;
use App\Modules\Admin\Controllers\BaseController;
use Illuminate\Http\Request;

class PermissionController extends BaseController
{
    public function create(Request $request)
    {
        $code = $request->get('code');
        $name = $request->get('name');

        Permission::create([
            'code' => $code,
            'name' => $name
        ]);
    }
}

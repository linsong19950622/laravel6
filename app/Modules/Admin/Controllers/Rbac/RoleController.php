<?php
/**
 * User: Administrator
 * Date: 2019/12/5
 * Time: 下午 4:24
 */

namespace App\Modules\Admin\Controllers\Rbac;

use App\Models\Role;
use App\Models\RolePermission;
use App\Modules\Admin\Controllers\BaseController;
use Illuminate\Http\Request;

class RoleController extends BaseController
{
    public function create(Request $request)
    {
        $name = $request->get('name');

        Role::create([
            'status' => Role::STATUS_YES,
            'name' => $name
        ]);
    }

    public function postPermission(Request $request)
    {
        $role = $request->get('role');
        $permission = $request->get('permission', []);

        $hasPermission = RolePermission::where('role_id', $role)
            ->get()
            ->toArray();
        $hasPermissionId = array_column($hasPermission, 'permission_id');
        //取消的权限
        $deletePermissionId = collect($hasPermissionId)->diff($permission)->all();
        //新增的权限
        $savePermissionId = collect($permission)->diff($hasPermissionId)->all();

        if (!empty($deletePermissionId)) {
            RolePermission::where('role_id', $role)
                ->whereIn('permission_id', $deletePermissionId)
                ->delete();
        }

        if (!empty($savePermissionId)) {
            $data = [];
            foreach ($savePermissionId as $value) {
                $data[] = [
                    'role_id' => $role,
                    'permission_id' => $value,
                    'created_at' => time(),
                    'updated_at' => time(),
                ];
            }

            RolePermission::insert($data);
        }
    }
}

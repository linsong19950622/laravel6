<?php
/**
 * User: 林松
 * Date: 2019/11/1
 * Time: 15:37
 */

namespace App\Modules\Api\Services;

use App\Models\User;
use App\Modules\Common\BaseService;

class IndexService extends BaseService
{

    public function getIndex()
    {
        $user = User::user();
        return $user;
    }

}

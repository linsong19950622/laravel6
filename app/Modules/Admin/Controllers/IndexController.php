<?php
/**
 * User: 林松
 * Date: 2019/10/31
 * Time: 15:49
 */

namespace App\Modules\Admin\Controllers;


class IndexController extends BaseController
{

    public function getIndex()
    {
        return view('welcome');
    }
}

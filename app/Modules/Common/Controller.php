<?php

namespace App\Modules\Common;

use App\Modules\Common\Traits\CallActionTrait;
use App\Modules\Common\Traits\ResponseTrait;
use App\Modules\Common\Traits\ValidateRequestTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests,
        ResponseTrait,
        ValidateRequestTrait,
        CallActionTrait;

    /**
     * 自定义 初始化构造方法
     * User: 林松    Date: 2019/12/10
     */
    public function initialize()
    {
        $this->validateRequest();
    }


    /**
     * 根据模块重写视图路径
     * @param null $view
     * @param array $data
     * @param array $mergeData
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * User: 林松    Date: 2019/10/31 16:43
     */
    public function view($view = null, $data = [], $mergeData = [])
    {
        $view = getCurrentModuleName() . '.' . $view;
        return view($view, $data, $mergeData);
    }
}

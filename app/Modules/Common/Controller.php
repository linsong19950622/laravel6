<?php

namespace App\Modules\Common;

use App\Exceptions\Common\ValidateRequestException;
use App\Modules\Common\Traits\CallActionTrait;
use App\Modules\Common\Traits\LaravelTrait;
use App\Modules\Common\Traits\ResponseTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

abstract class Controller extends BaseController
{
    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests,
        LaravelTrait,
        ResponseTrait,
        CallActionTrait;

    protected $validateToken = false;
    protected $validateExceptAction = [];

    public function initialize()
    {
        $this->_validateRequest();
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
        $fileUrl = get_called_class();
        $arr = explode('\\', $fileUrl);

        $view = ($arr[2] ?? '') . '.' . $view;
        return view($view, $data, $mergeData);
    }


    private function _validateRequest()
    {
        $formData = $this->_validateForm();
        $method = $this->getCurrentMethodName();

        if (array_key_exists($method, $formData)) {

            $rules = $formData[$method]['rules'] ?? [];
            $messages = $formData[$method]['messages'] ?? [];
            $attributes = $formData[$method]['attributes'] ?? [];
            $validator = Validator::make(Request::all(), $rules, $messages, $attributes);

            if ($validator->fails()) {
                throw new ValidateRequestException($validator->errors()->getMessages());
            }
        }
    }

    public function _validateForm()
    {
        /**
         * 示例
         * return [
         * 'getIndex' => [
         * 'rules' => [],
         * 'messages' => [],
         * 'attributes' => [],
         * ]
         * ];*/
        return [];
    }
}

<?php

/**
 * User: 林松
 * Date: 2019/11/19
 * Time: 15:51
 */

namespace App\Modules\Common\Traits;

use App\Exceptions\Common\ValidateRequestApiException;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

trait ValidateRequestTrait
{

    /**
     * 请求参数验证
     * User: 林松    Date: 2019/12/10
     */
    private function validateRequest()
    {
        $formData = $this->validateForm();
        $method = getCurrentMethodName();

        if (array_key_exists($method, $formData)) {
            $rules = $formData[$method]['rules'] ?? [];
            $messages = $formData[$method]['messages'] ?? trans('validation_message');
            $attributes = $formData[$method]['attributes'] ?? trans('validation_attribute');
            $validator = Validator::make(Request::all(), $rules, $messages, $attributes);

            if ($validator->fails()) {
                $this->throwValidationException($validator);
            }
        }
    }

    /**
     * 请求参数验证-规则
     * @return array
     * User: 林松    Date: 2019/12/10
     */
    public function validateForm()
    {

        /*return [
            'getIndex' => [
                'rules' => [],
                'messages' => [],
                'attributes' => [],
            ]
        ];*/
        return [];
    }

    /**
     * api请求-默认  验证规则，失败返回
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * User: 林松    Date: 2019/12/9
     */
    public function throwValidationException(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new ValidateRequestApiException($validator->errors()->getMessages());
    }
}

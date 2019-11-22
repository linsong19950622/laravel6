<?php
/**
 * User: 林松
 * Date: 2019/10/31
 * Time: 15:49
 */

namespace App\Modules\Api\Controllers;

use App\Modules\Api\Services\IndexService;
use App\Modules\Common\Rules\SensitiveWordRule;

class IndexController extends BaseController
{
    private $service;

    public function __construct(IndexService $service)
    {
        $this->service = $service;
    }

    public function _validateForm()
    {
        return [
            'getIndex' => [
                'rules' => [
                    'type' => 'required',
                    'name' => [
                        new SensitiveWordRule()
                    ]
                ],
                'messages' => [],
                'attributes' => [],
            ]
        ];
    }

    public function getIndex()
    {
        $result = $this->service->getIndex();

        return $this->jsonResult($result);
    }
}

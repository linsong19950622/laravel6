<?php
/**
 * Created by PhpStorm.
 * User: 林松
 * Date: 2021/3/16
 * Time: 19:29
 */

namespace App\Modules\Home\Controllers;


use App\Components\KafkaComponents;

/**
 * kafka测试demo
 * Class KafkaController
 * @package App\Modules\Home\Controllers
 */
class KafkaController extends BaseController
{

    /**
     * 生产者
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $kafka = new KafkaComponents();
        $kafka->producer('kafka', time(), '127.0.0.1:9092');

        return $this->view('welcome');
    }
}
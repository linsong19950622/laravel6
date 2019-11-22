<?php
/**
 * User: 林松
 * Date: 2019/10/31
 * Time: 15:49
 */

namespace App\Modules\Home\Controllers;


class IndexController extends BaseController
{

    private $services;

    public function __construct()
    {
    }

    public function index()
    {
        return $this->view('welcome');
    }
}

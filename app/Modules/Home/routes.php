<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index')->name('home.index');
Route::get('kafka', 'KafkaController@index')->name('home.kafka.index');//kafka测试路由

//兜底路由 类似404
Route::fallback(function () {
    return '当前url不存在对应的请求:404';
});

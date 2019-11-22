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
/**
 * 中间件：
 *      1.频率限制：1分钟60次 返回429状态码
 */
Route::middleware(['throttle:60,1'])->group(function(){
    Route::get('/', 'IndexController@getIndex')->name('api.index');
});

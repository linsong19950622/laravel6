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

Route::prefix('login')->group(function() {
   Route::get('/', 'LoginController@index')->middleware('guest:admin')->name('admin.login.index');
   Route::post('login', 'LoginController@login')->middleware('guest:admin')->name('admin.login');
   Route::get('logout', 'LoginController@logout')->middleware('auth:admin')->name('admin.logout');
});

Route::prefix('register')->middleware('guest:admin')->group(function() {
    Route::get('/', 'RegisterController@index')->name('admin.register.index');
    Route::post('register', 'RegisterController@register')->name('admin.register');
    Route::get('password-forget', 'RegisterController@passwordForget')->name('admin.password_forget');
});

Route::middleware('auth:admin')->group(function() {
    Route::get('/', 'IndexController@getIndex')->name('admin.index');

    Route::prefix('permission')->group(function(){
        Route::post('/', 'Rbac\PermissionController@create');
    });
    Route::prefix('role')->group(function(){
        Route::post('/', 'Rbac\RoleController@create');
        Route::post('permission', 'Rbac\RoleController@postPermission');
    });
});

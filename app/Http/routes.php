<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('/Home/index');
});
//后台登录页面
Route::get('/login',function(){
	return view('/Admin/login/login');
});
Route::post('/admin/login','Admin\LoginController@dologin');
// Route::group(['middleware' => 'login'], function () {
	//后台主页
	Route::get('/admin/index',function(){
		return view('/Admin/index/index');
	});

	//后台用户管理路由
	Route::resource('/admin/users','Admin\UsersController');
// });
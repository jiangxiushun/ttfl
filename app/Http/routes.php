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
// 验证码
Route::get('code','CodeController@index');
// ----------前---------------台---------------路----------------由----------
// 加载首页
Route::get('/','Home\IndexController@index');
// 前台注册
Route::controller('/home/reg','Home\RegisterController');
// 前台登录
Route::controller('/home/login','Home\LoginController');
// 加载商品列表页
Route::get('/home/list/{id}', 'Home\ListController@list');
Route::resource('/home/list', 'Home\ListController');
// 商品详情
Route::controller('/home/show/{id}','Home\ShowController');
// 文章路由
Route::get('/home/articles/{id}', 'Home\ArticlesController@show');

// 没有登录不允许的操作
Route::group(['middleware' => 'home_login'], function(){
	// 立即购买
	// Route::get('/home/ljgm/{id}','Home\CartsController');
	// 我的购物车
	Route::get('/home/wdgwc','Home\CartsController@getWdgwc');
	// 加入购物车
	Route::controller('/home/jrgwc','Home\CartsController');
});











// ----------后---------------台---------------路----------------由----------
// 后台登录页面
Route::get('/login',function(){
	return view('/Admin/login/login');
});
// 登录路由
Route::post('/admin/login','Admin\LoginController@dologin');
// 后台退出登录
Route::get('/admin/login/out', 'Admin\LoginController@loginout');


// 后台路由组
Route::group(['middleware' => 'admin_login'], function () {
	// 后台主页
	Route::get('/admin/index',function(){
		return view('/Admin/index/index');
	});
	// 加载后台修改密码
	Route::get('/admin/user/upwd/{id}','Admin\UsersController@upwd');
	// 执行后台修改密码
	Route::post('/admin/user/revise/{id}','Admin\UsersController@revise');
	// 后台用户管理路由
	Route::resource('/admin/users','Admin\UsersController');
	// 后台分类管理路由
	Route::resource('/admin/cates','Admin\CatesController');
	// 前台用户管理路由
	Route::resource('/home/users','Home\UsersController');
	// 后台添加子类
	Route::get('/admin/cates/{id}/sub','Admin\CatesController@sub');
	Route::post('/admin/cates/insert','Admin\CatesController@insert');
	// 后台商品路由
	Route::resource('/admin/good','Admin\GoodsController');
	Route::get('/admin/good/shang/{id}','Admin\GoodsController@shang');// 上架
	Route::get('/admin/good/xia/{id}','Admin\GoodsController@xia');// 下架
	// 后台轮播图
	Route::resource('/admin/lunbos','Admin\LunboController');
	// 友情链接
	Route::resource('/admin/link','Admin\LinksController');
	// 文章管理路由
	Route::resource('/admin/articles','Admin\ArticlesController');
});
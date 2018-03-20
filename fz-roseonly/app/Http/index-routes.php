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

/**
 * 前台路由设置区域
 * 命名空间:App\Http\Controllers\Index
 */



// 首页管理--------------------------------------------------------
// 加载首页
Route::get('/','HomeController@index');
// 加载个人中心
Route::get('/member/{id}','HomeController@member');
//修改密码
Route::post('/newpass/{id}','HomeController@newpass');
//修改个人信息
Route::post('/newmember/{id}','HomeController@newmember');
//添加收货地址
Route::post('/newmember/{id}','HomeController@newmember');
//
Route::get('/file/mmm','HomeController@mmm');




//加载商品列表页面-------------------------------------------------
Route::get('/list/{id}','ListController@index');
//根据销量排序
Route::get('/list/votes/{id}','ListController@votes');
//根据创建时间排序
Route::get('/list/create/{id}','ListController@create');
//根据价格排序
Route::get('/list/price/{id}','ListController@price');

//加载商品详情页面
Route::get('/detail/{id}','ListController@detail');



// 购物车页面 ----------------------------------------------------

Route::get('shopcar','ShopcarController@index');
Route::get('orderhome','OrderhomeController@index');

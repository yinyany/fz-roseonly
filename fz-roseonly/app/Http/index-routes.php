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
Route::post('/newmember/{id}','HomeController@update');
//上传头像的方法
Route::post('/file/newmember','HomeController@newmember');
//加载添加会员页面
Route::post('/newmember/{id}','HomeController@update');
//修改个人资料
Route::post('/memadress','HomeController@memadress');
//修改个人收获地址
Route::post('/shopcar/creates','ShopcarController@creates');
Route::get('/shopcar/shop','ShopcarController@shop');
Route::get('/shopcar/shops/{id}/{data}','ShopcarController@shops');
//删除收获地址
Route::get('/shopcar/destroys/{id}','ShopcarController@destroys');
//首页全站搜索
Route::post('/listname','ListController@listname');



//加载商品列表页面-------------------------------------------------
Route::get('/list/{id}/{type?}/{order?}','ListController@index');
// Route::get('/list/type/{id}','ListController@type');
//根据销量排序
Route::get('/list/votes/{id}','ListController@votes');
//根据创建时间排序
Route::get('/list/create/{id}','ListController@create');
//根据价格排序
Route::get('/list/price/{id}','ListController@price');

//加载商品详情页面
Route::get('/detail/{id}','ListController@detail');



// 购物车页面 ----------------------------------------------------

Route::get('/shopcar','ShopcarController@index');
//修改购物车数据
Route::post('/shopcar/update/{id}','ShopcarController@update');
Route::post('/shopcar/destroy/{id}','ShopcarController@destroy');
Route::get('/shopcar/show/{id}','ShopcarController@show');
Route::post('/shopcar/store','ShopcarController@store');
Route::post('/shopcar/create','ShopcarController@create');
Route::get('/shopcar/jiesuan','ShopcarController@jiesuan');

Route::get('/orderhome','OrderhomeController@index');
Route::get('/orderhome/destroy/{id}','OrderhomeController@destroy');
Route::post('/orderhome/update','OrderhomeController@update');
//商品详情加入购物车
Route::get('/shopping/{id}/{data}','ShopcarController@shopping');
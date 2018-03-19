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
 * 后台路由设置区域
 * 命名空间:App\Http\Controllers\admin
 */
// 会员管理--------------------------------------------------------
// 加载会员列表
Route::get('member','MemberController@index');
// 加载会员列表
Route::get('member/show/{id}','MemberController@show');
// 加载添加会员页面
Route::get('member/create','MemberController@create');
Route::post('member/store','MemberController@store');
// 删除会员
Route::get('member/destroy/{id}','MemberController@destroy');
// 加载修改页面
Route::get('member/edit/{id}','MemberController@edit');
Route::post('member/update/{id}','MemberController@update');

//轮播图管理=================================================

// 加载轮播图页面
Route::get('carousel','CarouselController@index');
//加载上传图片页面
Route::get('carousel/create','CarouselController@create');
//上传图片方法
Route::post('carousel/upload','CarouselController@upload');
//执行加载方法
Route::post('carousel/store','CarouselController@store');
//加载修改页面
Route::get('carousel/edit/{id}','CarouselController@edit');
//执行修改方法
Route::post('carousel/update/{id}','CarouselController@update');
//修改删除方法
Route::get('carousel/destroy/{id}','CarouselController@destroy');


//商品分类管理=================================================

// 加载分类页面
Route::get('type','TypeController@index');
//加载添加分类页面
Route::get('type/create','TypeController@create');
//执行添加方法
Route::post('type/store','TypeController@store');
//加载修改页面
Route::get('type/edit/{id}','TypeController@edit');
//执行修改方法
Route::post('type/update/{id}','TypeController@update');
//执行删除方法
Route::get('type/destroy/{id}','TypeController@destroy');

//商品列表管理=================================================

// 商品列表页面
Route::get('goods','GoodsController@index');
//加载添加分类页面
Route::get('goods/create','GoodsController@create');

Route::get('goods/good','GoodsController@good');
//上传图片方法
Route::post('goods/upload','GoodsController@upload');
//执行添加方法
Route::post('goods/store','GoodsController@store');
//加载修改页面
Route::get('goods/edit/{id}','GoodsController@edit');
//执行修改方法
Route::post('goods/update/{id}','GoodsController@update');
//修改删除方法
Route::get('goods/destroy/{id}','GoodsController@destroy');


// 权限管理--------------------------------------------------------
//加载管理员列表
Route::get('user','UserController@index');
// 加载分配角色页面
Route::get('user/edit/{id}','UserController@edit');
Route::post('user/update/{id}','UserController@update');
// 加载修改状态页面
Route::get('user/state/{id}','UserController@state');
Route::post('user/updatestate/{id}','UserController@updatestate');
//加载添加管理员页面
Route::get('user/create','UserController@create');
Route::post('user/store','UserController@store');
//删除管理员
Route::get('user/destroy/{id}','UserController@destroy');




// 加载角色列表
Route::get('role','RoleController@index');
// 加载分配权限页面
Route::get('role/edit/{id}','RoleController@edit');
Route::post('role/update/{id}','RoleController@update');
// 加载修改角色页面
Route::get('role/data/{id}','RoleController@data');
Route::post('role/updatedata/{id}','RoleController@updatedata');
//加载添加角色页面
Route::get('role/create','RoleController@create');
Route::post('role/store','RoleController@store');

//删除管理员
Route::get('role/destroy/{id}','RoleController@destroy');



//加载权限列表
Route::get('pers','PermissionController@index');
//加载修改权限页面
Route::get('pers/edit/{id}','PermissionController@edit');
Route::post('pers/update/{id}','PermissionController@update');
//加载添加权限页面
Route::get('pers/create','PermissionController@create');
Route::post('pers/store','PermissionController@store');

//删除权限
Route::get('pers/destroy/{id}','PermissionController@destroy');


//属性名列表管理=================================================

// 属性列表页面
Route::get('bute','ButeController@index');
//加载添加分类页面
Route::get('bute/create','ButeController@create');
Route::get('bute/good','ButeController@good');
//执行添加方法
Route::post('bute/store','ButeController@store');
//加载修改页面
Route::get('bute/edit/{id}','ButeController@edit');
//执行修改方法
Route::post('bute/update/{id}','ButeController@update');
//执行删除方法
Route::get('bute/destroy/{id}','ButeController@destroy');


//属性值列表管理=================================================

// 属性列表页面
Route::get('values','ValueController@index');
//加载添加分类页面
Route::get('values/create','ValueController@create');
//执行添加方法
Route::post('values/store','ValueController@store');
//加载修改页面
Route::get('values/edit/{id}','ValueController@edit');
//执行修改方法
Route::post('values/update/{id}','ValueController@update');
//执行删除方法
Route::get('values/destroy/{id}','ValueController@destroy');
//上传图片方法
Route::post('values/upload','ValueController@upload');

//库存列表管理=================================================

//库存列表页面
Route::get('stock','StockController@index');
//加载添加页面
Route::get('stock/create','StockController@create');
Route::get('stock/good','StockController@good');
//执行添加方法
Route::post('stock/store','StockController@store');
//加载修改页面
Route::get('stock/edit/{id}','StockController@edit');
//执行修改方法
Route::post('stock/update/{id}','StockController@update');
//执行删除方法
Route::get('stock/destroy/{id}','StockController@destroy');


//加载订单列表
Route::get('order','OrderController@index');
//加载订单详情页面
Route::get('order/edit/{id}','OrderController@edit');
//执行修改订单详情页面
Route::post('order/update/{id}','OrderController@update');



//评论管理--------------------------------------------------------------------

//加载评论列表
Route::get('comment','CommentController@index');
//加载回复评论页面
Route::get('comment/edit/{id}','CommentController@edit');
Route::post('comment/update/{id}','CommentController@update');
// //加载回复评论页面
// Route::get('pers/create','PermissionController@create');
// Route::post('pers/store','PermissionController@store');

// //删除权限
// Route::get('pers/destroy/{id}','PermissionController@destroy');


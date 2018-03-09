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


// 加载轮播图页面
Route::get('carousel','CarouselController@index');
Route::get('carousel/create','CarouselController@create');


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


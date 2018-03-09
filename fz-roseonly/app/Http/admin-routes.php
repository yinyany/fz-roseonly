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
// 加载会员列表
Route::get('member','MemberController@index');
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
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

Route::get('/', function () {
    return view('welcome');
});

/**
 * 以下是测试路由功能用的
 */

//基本路由
Route::get('/foo', function (){
    return 'hello world!';
});

//重定向路由
Route::redirect('/redirect', '/foo');//302重定向
Route::redirect('/redirect301', '/foo', 301);//301重定向
Route::permanentRedirect('permanentRedirect', '/foo');//301重定向

//视图路由
Route::view('/hello', 'hello');
Route::view('/hello_laravel', 'hello_laravel', ['name'=>'Laravel']);

//路由参数
Route::get('hello/{name}', function ($name){//必填参数
    return 'Hello, ' . $name;
});

Route::get('hello/{name}/good/{time}', function ($name, $time){//必填多参数
    return 'Hello, ' . $name . '! good ' . $time . '!';
});

Route::get('/post/{id?}', function ($id = 1){//可选参数
    return 'post_id = ' . $id;
});
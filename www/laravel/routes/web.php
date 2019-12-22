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


//路由命名
Route::get('user/profile' ,function (){
    return '路由命名';
})->name('profile');

Route::get('profile' ,function (){
    return route('profile', ['id'=>1]);//根据路由名称生成路由
});

//命名空间
Route::namespace('admin')->group(function (){
   Route::get('admin', 'AdminController@index');
});

//路由前缀
Route::prefix('user')->group(function (){
    Route::get('index', function (){
        return url('comment');
    });
});

//路由名称前缀
Route::name('comment.')->group(function (){
    Route::get('comment', function (){
        return 'comment.index';
    })->name('comment');
});


//路由模型绑定
//饮食绑定
Route::get('api/users/{user}', function (App\User $user){
    return $user->name;
});

//回退路由
Route::fallback(function (){
    return '404';
});


//路由中间件
Route::get('age', function (){
    return 'age >= 20';
})->middleware('checkAge','checkName');

Route::get('/user/index', 'UserController@index');
Route::get('/user/detail/{id}', 'UserController@detail');
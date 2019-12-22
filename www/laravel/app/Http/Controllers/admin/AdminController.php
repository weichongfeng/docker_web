<?php
/**
 * Created by PhpStorm.
 * User: 11814
 * Date: 2019/12/21
 * Time: 15:23
 */

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;


class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('checkToken');

        //自定义中间件
        $this->middleware(function ($request, $next){
            if (!$request->name){
                return redirect('/');
            }
            return $next($request);
        });
    }


    public function index(){
        return 'AdminController@index';
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: 11814
 * Date: 2019/12/22
 * Time: 20:53
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserController
{
    public function index(Request $request){
        $name = $request->input('name');
        return $name;
    }

    public function detail(Request $request, $id){
        $name = $request->name;
        return ['name'=>$name, 'id'=>$id];
    }

}
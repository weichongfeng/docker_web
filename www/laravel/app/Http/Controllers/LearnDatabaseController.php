<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Events\OrderShipped;

class LearnDatabaseController extends Controller
{
    public function select(){
        event(new OrderShipped());
        $post = DB::select('select * from post where id = :id', ['id'=>1]);
        return $post;
    }

    public function update(){
        $content = md5(time());
        $result = DB::update("update post set content = :content  where id = 1", ['content'=>$content]);
        return DB::select('select * from post where id = :id', ['id'=>1]);
    }



}

<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;

use App\Events\OrderShipped;

class LearnDatabaseController extends Controller
{
    public function select()
    {
        event(new OrderShipped());
        $post = DB::select('select * from post where id = :id', ['id' => 1]);
        return $post;
    }

    public function update()
    {
        $content = md5(time());
        $result = DB::update("update post set content = :content  where id = 1", ['content' => $content]);
        return DB::select('select * from post where id = :id', ['id' => 1]);
    }

    public function redisTest()
    {
        Redis::set('test', 123);
        return Redis::get('test');
    }

    public function redisSubscribe()
    {
        Redis::publish('test-channel', 'Hello Word!');
        return "Hello Word!";
    }

    public function cacheTest()
    {
        Cache::store('file')->set('file', 'file', 10);
        Cache::store('redis')->set('redis', 'redis', 10);
        return Cache::store('redis')->get('redis');
    }
}

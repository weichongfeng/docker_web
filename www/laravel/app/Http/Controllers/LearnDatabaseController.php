<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;

use App\Events\OrderShipped;
use App\Jobs\ProcessPodcast;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

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
        $redis = Redis::connection('publisher');
        $redis->setex('test', 10, 100);
        return Redis::get('test');
    }

    public function redisSubscribe()
    {
        Redis::connection('default')->command('set', ['test1', 123131]);
        return Redis::connection('default')->command('get', ['test1']);

        // Redis::connection('default')->set('test-channel', 'Hello Word!');
        // Redis::connection('default')->publish('test-channel', 'Hello Word!');

        // // Redis::publish('test-channel', 'Hello Word!');
        // return "Hello Word!";
    }

    public function cacheTest()
    {
        // Cache::store('file')->set('file', 'file', 10);
        Cache::store('redis')->put('redis', 'redis', 10);
        return Cache::store('redis')->get('redis');
    }

    public function queueTest()
    {
        ProcessPodcast::dispatch();
    }

    public function elopuentTest()
    {
        $posts = Category::find(2)->posts;
        foreach ($posts as $post) {
            echo $post->title . PHP_EOL;
        }

        echo "<hr/>";

        $comment = Post::find(2)->category;
        echo $comment->name;

        echo "<hr/>";

        $post = Post::find(2);

        foreach ($post->tags as $tag) {
            echo $tag->name . PHP_EOL;
        }
        echo "<hr/>";

        $tag = Tag::find(1);
        foreach($tag->posts as $post){
            echo $post->title . PHP_EOL;
        }
    }
}

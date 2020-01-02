<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class RedisKeyEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:keyExpired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'redis key 过期监听';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Redis::psubscribe(['__keyevent@*__:expired'], function ($key, $channel) {
            echo $channel.PHP_EOL;//订阅的频道
            echo $key.PHP_EOL;//过期的key
            echo '---'.PHP_EOL;
        });
    }
}

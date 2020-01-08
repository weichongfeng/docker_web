<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * 重新定义表明
     */
    protected $table = 'post';

    /**
     * 重新定义主键
     */
    protected $primaryKey = 'id';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * 重新定义表明
     */
    // protected $table = 'posts';

    /**
     * 重新定义主键
     */
    protected $primaryKey = 'id';

    /**
     * 获取文章分类
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    /**
     * 获取文章标签
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'post_tag', 'post_id', 'tag_id');
    }
}

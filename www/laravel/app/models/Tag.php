<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * 重新定义表明
     */
    protected $table = 'tags';

    /**
     * 重新定义主键
     */
    protected $primaryKey = 'id';

    /**
     * 获取标签文章
     */
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'post_tag', 'tag_id', 'post_id');
    }
}

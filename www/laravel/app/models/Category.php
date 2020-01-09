<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * 重新定义表明
     */
    protected $table = 'categories';

    /**
     * 重新定义主键
     */
    protected $primaryKey = 'id';

    /**
     * 获取分类下文章
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'category_id', 'id');
    }
}

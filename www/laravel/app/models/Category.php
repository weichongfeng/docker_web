<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
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

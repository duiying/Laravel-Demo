<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // 表名
    protected $table = 'posts';

    // 能够被赋值的字段
    protected $fillable = [
        'user_id', 'title', 'content',
    ];

    // 一对多
    public function comments()
    {
        // return $this->hasMany(Comment::class, 'post_id', 'id');
        // 第3个参数默认为 id , 可以省略
        return $this->hasMany(Comment::class, 'post_id');
    }
}

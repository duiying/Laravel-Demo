<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * 帖子列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // 按照 created_at 倒序排列, 每页10条数据
        $posts = Post::orderByDesc('created_at')->paginate(10);

        return view('index.index', compact('posts'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('auth')->only('comment');
    }
    */

    public function create()
    {
        return view('post.create');
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5|unique:posts,title',
            'content' => 'required'
        ], [
            'title.required' => '标题不能为空',
            'title.unique' => '标题已经存在',
            'title.min' => '标题不能少于5个字符',
            'content.required' => '内容不能为空',
        ]);

        Post::create([
           'user_id' => 0,
           'title' => $request->post('title'),
           'content' => $request->post('content')
        ]);

        session()->flash('success', '创建成功');

        return redirect('/');
    }

    /**
     * 帖子详情
     *
     * @param $post_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($post_id)
    {
        $post = Post::findOrFail($post_id);
        return view('post.detail', compact('post'));
    }

    public function comment(Request $request, $post_id)
    {
        $this->validate($request, [
            'content' => 'required',
        ], [
            'content.required' => '请输入评论内容',
        ]);

        /*
        $content = $request->post('content');

        Comment::create([
            'user_id' => 0,
            'post_id' => $post_id,
            'content' => $content
        ]);
        */

        $post = Post::findOrFail($post_id);
        $post->comments()->save(new Comment([
            'user_id' => 0,
            'content' => $request->post('content'),
            // post_id会自动填充
        ]));

        session()->flash('success', '评论成功');

        // 记录用户最后一次评论时间
        cache()->put('comment_at_' . Auth::id(), time());

        return back();
    }
}

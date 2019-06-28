@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">首页</a></li>
                        <li class="breadcrumb-item active" aria-current="page">帖子详情</li>
                    </ol>
                </nav>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        {{$post->title}}
                    </div>
                    <div class="card-body">
                        {{$post->content}}
                    </div>
                    <div class="card-footer text-right">创建时间: {{$post->created_at}}</div>
                </div>
            </div>

            <div class="col-sm-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        发表评论
                    </div>
                    <div class="card-body">
                        <form action="{{route('post.comment', $post)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <textarea name="content" class="form-control" rows="3" placeholder="请输入评论内容"></textarea>
                            </div>
                            <div class="form-group text-right">
                                <button class="btn btn-primary" type="submit">提交</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mt-3">
                @foreach($post->comments as $comment)
                <div class="card mt-1">
                    <div class="card-body">{{$comment->content}}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
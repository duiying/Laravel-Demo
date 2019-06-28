@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">首页</a></li>
                        <li class="breadcrumb-item active" aria-current="page">创建帖子</li>
                    </ol>
                </nav>
            </div>

            <div class="col-sm-12">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">标题</label>
                        <input type="text" name="title" class="form-control" placeholder="请输入标题">
                    </div>

                    <div class="form-group">
                        <label for="title">内容</label>
                        <textarea name="content" rows="10" class="form-control" placeholder="请输入内容"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">提交</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
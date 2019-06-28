@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @foreach($posts as $post)
                    <div class="card mt-2">
                        <div class="card-header">
                            {{--<a href="{{url('/post/'.$post->id)}}">{{$post->title}}</a>--}}
                            <a href="{{route('post.detail', [$post->id])}}">{{$post->title}}</a>
                        </div>
                        <div class="card-body">
                            {{str_limit($post->content, 120)}}
                        </div>
                        <div class="card-footer text-right">{{$post->created_at}}</div>
                    </div>
                @endforeach
            </div>

            <div class="col-sm-12">
                {{$posts->render()}}
            </div>
        </div>
    </div>

@endsection
@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <br>
    <p>{{ $post->description }}</p>
    <br>
    <div class="col-2">
        <img class="img-fluid" style="max-width:100%;" src="{{ asset('images/'.$post->image)}}"
             alt="">
    </div>
    <br>
    <a href="{{ route('post.edit', $post->id) }}">Edit this post</a>
    <br>
    <a href="{{ route('posts.index') }}">← Back to all posts</a>
@endsection

@extends('frontend.layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <br>
    <p>{{ $post->description }}</p>
        <br>
        <div class="col-2">
            <img class="img-fluid" style="max-width:100%;" src="{{ asset('frontend/assets/img/'.$post->image)}}"
            alt="">
        </div>
    @foreach ($post->tags as $tag)
        <p class="badge bg-secondary text-decoration-none me-1">{{ $tag->name }}</p>
    @endforeach
    <br>
    <a href="{{ route('post.edit', $post->id) }}">Edit this post</a>
    <br>
    <a href="{{ route('posts.index') }}">← Back to all posts</a>
@endsection

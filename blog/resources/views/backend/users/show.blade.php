@extends('frontend.layouts.master')

@section('title', $post->title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ $post->title }}</h1>
                <p class="text-muted">By {{ $post->user->name ?? 'Unknown' }} | {{ $post->created_at->format('d/m/Y H:i') }}</p>
                <div class="mb-3">
                    @foreach($post->tags as $tag)
                        <span class="badge bg-primary">{{ $tag->name }}</span>
                    @endforeach
                </div>
                <div>{!! nl2br(e($post->content)) !!}</div>
                <a href="{{ route('posts.index') }}" class="btn btn-primary mt-3">Back to Posts</a>
            </div>
        </div>
    </div>
@endsection

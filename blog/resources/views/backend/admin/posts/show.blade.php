@extends('backend.layouts.master')

@section('title', $post->title)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">{{ $post->title }}</h4>
                </div>
                <div class="card">
                    <div class="card-body">
                        <p class="text-muted">By {{ $post->user->name ?? 'Unknown' }} | {{ $post->created_at->format('d/m/Y H:i') }}</p>
                        <div class="mb-3">
                            @foreach($post->tags as $tag)
                                <span class="badge bg-primary">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                        <div>{!! nl2br(e($post->content)) !!}</div>
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-primary mt-3">Back to Posts</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

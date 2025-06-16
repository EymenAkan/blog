@extends('frontend.layouts.app')

@php
    // Apply tag theming based on post's tags
    $activeTagColor = null;
    $activeTagColorDark = null;
    $activeTagColorLight = null;
    $hasTagTheme = false;

    if ($post->tags->count() > 0) {
        $hasTagTheme = true;
        $activeTagColor = $post->tags->first()->theme_color;

        // Create darker and lighter variants
        $hex = str_replace('#', '', $activeTagColor);
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));

        $activeTagColorDark = sprintf("#%02x%02x%02x",
            max(0, $r - 40),
            max(0, $g - 40),
            max(0, $b - 40)
        );

        $activeTagColorLight = sprintf("#%02x%02x%02x",
            min(255, $r + 40),
            min(255, $g + 40),
            min(255, $b + 40)
        );
    }
@endphp

@section('title', $post->title . ' - Eymen\'s Blog')

@section('content')
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-clean">
                    <li class="breadcrumb-item">
                        <a href="{{ route('posts.index') }}">
                            <i class="fas fa-home me-1"></i>
                            Home
                        </a>
                    </li>
                    @if($post->tags->count() > 0)
                        <li class="breadcrumb-item">
                            <a href="{{ route('posts.filterByTag', $post->tags->first()->slug) }}">
                                {{ $post->tags->first()->name }}
                            </a>
                        </li>
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($post->title, 30) }}</li>
                </ol>
            </nav>

            <!-- Post Content -->
            <article class="content-card">
                <!-- Post Header -->
                <header class="mb-4">
                    <div class="mb-3">
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('posts.filterByTag', $tag->slug) }}"
                               class="tag-badge-clean"
                               style="background: {{ $tag->theme_color }}; color: white; border-color: {{ $tag->theme_color }};">
                                {{ $tag->name }}
                            </a>
                        @endforeach
                    </div>

                    <h1 class="mb-3" style="color: var(--text-primary); font-weight: 700; line-height: 1.2;">
                        {{ $post->title }}
                    </h1>

                    <div class="d-flex align-items-center text-muted mb-4">
                        <i class="fas fa-calendar me-2"></i>
                        <span class="me-4">{{ $post->created_at->format('F d, Y') }}</span>
                        <i class="fas fa-clock me-2"></i>
                        <span>{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                </header>

                <!-- Post Image -->
                @if($post->image)
                    <div class="mb-4 text-center">
                        <img class="img-fluid post-image"
                             style="max-width: 100%; height: auto;"
                             src="{{ asset('frontend/assets/img/'.$post->image)}}"
                             alt="{{ $post->title }}">
                    </div>
                @endif

                <!-- Post Content -->
                <div class="post-content mb-4">
                    <p style="color: var(--text-primary); font-size: 1.1rem; line-height: 1.8;">
                        {{ $post->description }}
                    </p>
                </div>

                <!-- Post Actions -->
                <div class="border-top pt-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-clean-outline btn-sm me-2">
                                <i class="fas fa-edit me-1"></i>
                                Edit Post
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('posts.index') }}" class="btn btn-clean btn-sm">
                                <i class="fas fa-arrow-left me-1"></i>
                                Back to Posts
                            </a>
                        </div>
                    </div>
                </div>
            </article>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Related Tags -->
            @if($post->tags->count() > 0)
                <div class="sidebar-card">
                    <h5 class="mb-3">
                        <i class="fas fa-tags me-2"></i>
                        Post Topics
                    </h5>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('posts.filterByTag', $tag->slug) }}"
                               class="tag-badge-clean"
                               style="background: {{ $tag->theme_color }}20; color: {{ $tag->theme_color }}; border-color: {{ $tag->theme_color }};">
                                {{ $tag->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Related Posts -->
            @php
                $relatedPosts = \App\Models\Post::where('id', '!=', $post->id)
                    ->whereHas('tags', function($query) use ($post) {
                        $query->whereIn('tags.id', $post->tags->pluck('id'));
                    })
                    ->with('tags')
                    ->limit(3)
                    ->get();
            @endphp

            @if($relatedPosts->count() > 0)
                <div class="sidebar-card">
                    <h5 class="mb-3">
                        <i class="fas fa-newspaper me-2"></i>
                        Related Posts
                    </h5>
                    @foreach($relatedPosts as $relatedPost)
                        <div class="mb-3 pb-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                            <h6 class="mb-2">
                                <a href="{{ route('post.show', $relatedPost->id) }}"
                                   class="text-decoration-none"
                                   style="color: var(--text-primary);">
                                    {{ Str::limit($relatedPost->title, 50) }}
                                </a>
                            </h6>
                            <div class="mb-2">
                                @foreach($relatedPost->tags->take(2) as $tag)
                                    <span class="tag-badge-clean"
                                          style="background: {{ $tag->theme_color }}20; color: {{ $tag->theme_color }}; font-size: 0.75rem;">
                                        {{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>
                            <small class="text-muted">
                                {{ $relatedPost->created_at->format('M d, Y') }}
                            </small>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Quick Actions -->
            <div class="sidebar-card">
                <h5 class="mb-3">
                    <i class="fas fa-tools me-2"></i>
                    Quick Actions
                </h5>
                <div class="d-grid gap-2">
                    <a href="{{ route('posts.create') }}" class="btn btn-clean btn-sm">
                        <i class="fas fa-plus me-2"></i>
                        Write New Post
                    </a>
                    <a href="{{ route('tags.index') }}" class="btn btn-clean-outline btn-sm">
                        <i class="fas fa-tags me-2"></i>
                        Manage Tags
                    </a>
                </div>
            </div>

            <!-- Post Stats -->
            <div class="sidebar-card">
                <h5 class="mb-3">
                    <i class="fas fa-info-circle me-2"></i>
                    Post Info
                </h5>
                <div class="small">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Published:</span>
                        <span>{{ $post->created_at->format('M d, Y') }}</span>
                    </div>
                    @if($post->updated_at != $post->created_at)
                        <div class="d-flex justify-content-between mb-2">
                            <span>Updated:</span>
                            <span>{{ $post->updated_at->format('M d, Y') }}</span>
                        </div>
                    @endif
                    <div class="d-flex justify-content-between">
                        <span>Tags:</span>
                        <span>{{ $post->tags->count() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@if($hasTagTheme)
    @push('styles')
        <style>
            :root {
                --primary-color: {{ $activeTagColor }};
                --secondary-color: {{ $activeTagColorDark }};
                --accent-color: {{ $activeTagColorLight }};
            }
        </style>
    @endpush
@endif

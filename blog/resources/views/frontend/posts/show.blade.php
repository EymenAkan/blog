@extends('layouts.app')

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
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb" style="background: transparent; padding: 0;">
                    <li class="breadcrumb-item">
                        <a href="{{ route('posts.index') }}"
                           class="text-decoration-none"
                           style="color: var(--text-secondary);">
                            <i class="fas fa-home me-1"></i>
                            Home
                        </a>
                    </li>
                    @if($post->tags->count() > 0)
                        <li class="breadcrumb-item">
                            <a href="{{ route('posts.filterByTag', $post->tags->first()->slug) }}"
                               class="text-decoration-none"
                               style="color: var(--text-secondary);">
                                {{ $post->tags->first()->name }}
                            </a>
                        </li>
                    @endif
                    <li class="breadcrumb-item active" aria-current="page" style="color: var(--text-primary);">
                        {{ Str::limit($post->title, 40) }}
                    </li>
                </ol>
            </nav>

            <!-- Post Content -->
            <article class="content-card">
                <!-- Post Header -->
                <header class="mb-4">
                    <div class="mb-3">
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('posts.filterByTag', $tag->slug) }}"
                               class="tag-badge"
                               style="background: linear-gradient(135deg, {{ $tag->theme_color }}, {{ $tag->theme_color }}dd);">
                                {{ $tag->name }}
                            </a>
                        @endforeach
                    </div>

                    <h1 class="mb-3" style="font-family: 'Playfair Display', serif; color: var(--text-primary); font-weight: 600; line-height: 1.3;">
                        {{ $post->title }}
                    </h1>

                    <div class="d-flex align-items-center mb-4" style="color: var(--text-muted);">
                        <div class="me-4">
                            <i class="fas fa-calendar me-2"></i>
                            <span>{{ $post->created_at->format('F d, Y') }}</span>
                        </div>
                        <div class="me-4">
                            <i class="fas fa-clock me-2"></i>
                            <span>{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                        @if($post->updated_at != $post->created_at)
                            <div>
                                <i class="fas fa-edit me-2"></i>
                                <span>Updated {{ $post->updated_at->diffForHumans() }}</span>
                            </div>
                        @endif
                    </div>
                </header>

                <!-- Post Image -->
                @if($post->image)
                    <div class="mb-4 text-center">
                        <img class="img-fluid"
                             style="max-width: 100%; height: auto; border-radius: 12px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);"
                             src="{{ asset('frontend/assets/img/'.$post->image)}}"
                             alt="{{ $post->title }}">
                    </div>
                @endif

                <!-- Post Content -->
                <div class="post-content mb-4">
                    <div style="color: var(--text-primary); font-size: 1.1rem; line-height: 1.8;">
                        {!! nl2br(e($post->description)) !!}
                    </div>
                </div>

                <!-- Post Footer -->
                <footer class="border-top pt-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="d-flex gap-2">
                                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-balanced-outline btn-sm">
                                    <i class="fas fa-edit me-1"></i>
                                    Edit Post
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 text-md-end mt-3 mt-md-0">
                            <a href="{{ route('posts.index') }}" class="btn btn-balanced btn-sm">
                                <i class="fas fa-arrow-left me-1"></i>
                                Back to Posts
                            </a>
                        </div>
                    </div>
                </footer>
            </article>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Post Tags -->
            @if($post->tags->count() > 0)
                <div class="sidebar-card">
                    <h5 class="mb-3" style="color: var(--text-primary); font-weight: 600;">
                        <i class="fas fa-tags me-2" style="color: var(--primary-color);"></i>
                        Post Topics
                    </h5>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('posts.filterByTag', $tag->slug) }}"
                               class="tag-badge"
                               style="background: linear-gradient(135deg, {{ $tag->theme_color }}, {{ $tag->theme_color }}cc);">
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
                    ->limit(4)
                    ->get();
            @endphp

            @if($relatedPosts->count() > 0)
                <div class="sidebar-card">
                    <h5 class="mb-3" style="color: var(--text-primary); font-weight: 600;">
                        <i class="fas fa-newspaper me-2" style="color: var(--primary-color);"></i>
                        Related Posts
                    </h5>
                    @foreach($relatedPosts as $relatedPost)
                        <div class="mb-3 pb-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                            <h6 class="mb-2">
                                <a href="{{ route('post.show', $relatedPost->id) }}"
                                   class="text-decoration-none"
                                   style="color: var(--text-primary); line-height: 1.4;">
                                    {{ Str::limit($relatedPost->title, 60) }}
                                </a>
                            </h6>
                            <div class="mb-2">
                                @foreach($relatedPost->tags->take(2) as $tag)
                                    <span class="tag-badge"
                                          style="background: {{ $tag->theme_color }}; font-size: 0.75rem; padding: 0.2rem 0.6rem;">
                                        {{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>
                            <small style="color: var(--text-muted);">
                                <i class="fas fa-calendar me-1"></i>
                                {{ $relatedPost->created_at->format('M d, Y') }}
                            </small>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Quick Actions -->
            <div class="sidebar-card">
                <h5 class="mb-3" style="color: var(--text-primary); font-weight: 600;">
                    <i class="fas fa-tools me-2" style="color: var(--primary-color);"></i>
                    Quick Actions
                </h5>
                <div class="d-grid gap-2">
                    <a href="{{ route('posts.create') }}" class="btn btn-balanced btn-sm">
                        <i class="fas fa-plus me-2"></i>
                        Write New Post
                    </a>
                    <a href="{{ route('tags.index') }}" class="btn btn-balanced-outline btn-sm">
                        <i class="fas fa-tags me-2"></i>
                        Manage Tags
                    </a>
                    @if($post->tags->count() > 0)
                        <a href="{{ route('posts.filterByTag', $post->tags->first()->slug) }}" class="btn btn-balanced-outline btn-sm">
                            <i class="fas fa-filter me-2"></i>
                            More {{ $post->tags->first()->name }} Posts
                        </a>
                    @endif
                </div>
            </div>

            <!-- Post Statistics -->
            <div class="sidebar-card">
                <h5 class="mb-3" style="color: var(--text-primary); font-weight: 600;">
                    <i class="fas fa-info-circle me-2" style="color: var(--primary-color);"></i>
                    Post Details
                </h5>
                <div class="row">
                    <div class="col-6">
                        <div class="stats-card">
                            <div class="stats-number">{{ $post->tags->count() }}</div>
                            <small style="color: var(--text-secondary);">Topics</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stats-card">
                            <div class="stats-number">{{ str_word_count(strip_tags($post->description)) }}</div>
                            <small style="color: var(--text-secondary);">Words</small>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="small" style="color: var(--text-secondary);">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Published:</span>
                            <span>{{ $post->created_at->format('M d, Y') }}</span>
                        </div>
                        @if($post->updated_at != $post->created_at)
                            <div class="d-flex justify-content-between mb-2">
                                <span>Last Updated:</span>
                                <span>{{ $post->updated_at->format('M d, Y') }}</span>
                            </div>
                        @endif
                        <div class="d-flex justify-content-between">
                            <span>Reading Time:</span>
                            <span>~{{ ceil(str_word_count(strip_tags($post->description)) / 200) }} min</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            @php
                $prevPost = \App\Models\Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();
                $nextPost = \App\Models\Post::where('id', '>', $post->id)->orderBy('id', 'asc')->first();
            @endphp

            @if($prevPost || $nextPost)
                <div class="sidebar-card">
                    <h5 class="mb-3" style="color: var(--text-primary); font-weight: 600;">
                        <i class="fas fa-arrows-alt-h me-2" style="color: var(--primary-color);"></i>
                        Post Navigation
                    </h5>

                    @if($prevPost)
                        <div class="mb-3">
                            <small style="color: var(--text-muted);">
                                <i class="fas fa-arrow-left me-1"></i>
                                Previous Post
                            </small>
                            <div>
                                <a href="{{ route('post.show', $prevPost->id) }}"
                                   class="text-decoration-none"
                                   style="color: var(--text-primary); font-weight: 500;">
                                    {{ Str::limit($prevPost->title, 50) }}
                                </a>
                            </div>
                        </div>
                    @endif

                    @if($nextPost)
                        <div>
                            <small style="color: var(--text-muted);">
                                <i class="fas fa-arrow-right me-1"></i>
                                Next Post
                            </small>
                            <div>
                                <a href="{{ route('post.show', $nextPost->id) }}"
                                   class="text-decoration-none"
                                   style="color: var(--text-primary); font-weight: 500;">
                                    {{ Str::limit($nextPost->title, 50) }}
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            @endif
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

@push('styles')
    <style>
        .post-content {
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .post-content p {
            margin-bottom: 1.5rem;
        }

        .breadcrumb-item + .breadcrumb-item::before {
            content: "›";
            color: var(--text-muted);
        }

        .breadcrumb-item a:hover {
            color: var(--primary-color) !important;
        }

        .breadcrumb-item.active {
            font-weight: 500;
        }

        /* Enhanced hover effects for related posts */
        .sidebar-card a:hover {
            color: var(--primary-color) !important;
            transition: color 0.3s ease;
        }

        /* Better spacing for post navigation */
        .sidebar-card .mb-3:last-child {
            margin-bottom: 0 !important;
        }
    </style>
@endpush

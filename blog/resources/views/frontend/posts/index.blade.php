@extends('layouts.app')

@php
    $activeTagColor = null;
    $activeTagColorDark = null;
    $activeTagColorLight = null;
    $hasTagTheme = false;
    $showTagBanner = true;

    if (isset($tag)) {
        $hasTagTheme = true;
        $activeTagColor = $tag->theme_color;
        $hex = str_replace('#', '', $activeTagColor);
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));

        $activeTagColorDark = sprintf("#%02x%02x%02x",
            max(0, $r - 40), max(0, $g - 40), max(0, $b - 40));
        $activeTagColorLight = sprintf("#%02x%02x%02x",
            min(255, $r + 40), min(255, $g + 40));
    }

    $allTags = \App\Models\Tag::withCount('posts')->orderBy('name')->get();
@endphp

@section('title', isset($tag)
    ? __('posts.title_with_tag', ['tag' => $tag->name])
    : __('posts.title_default'))

@section('hero')
    <div class="text-center">
        <h1 class="hero-title">
            {{ isset($tag) ? $tag->name : __('posts.hero_default_title') }}
        </h1>
        <p class="hero-subtitle">
            {{ isset($tag)
                ? __('posts.hero_tag_subtitle', ['count' => $posts->count(), 'post' => Str::plural('post', $posts->count())])
                : __('posts.hero_default_subtitle') }}
        </p>
    </div>
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert"
             style="border-radius: 12px; border: none;">
            <i class="fas fa-check-circle me-2"></i>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            @if ($posts->count() > 0)
                @foreach ($posts as $post)
                    <article class="content-card">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img class="img-fluid w-100 post-image"
                                     style="object-fit: cover; width: 200px; height: 200px;"
                                     src="{{ asset('frontend/assets/img/'.$post->image)}}"
                                     alt="{{ $post->title }}">
                            </div>
                            <div class="col-md-8">
                                <div class="p-3">
                                    <div class="mb-3">
                                        @foreach ($post->tags as $postTag)
                                            <a href="{{ route('blog.filterByTag', $postTag->slug) }}"
                                               class="tag-badge"
                                               style="background: linear-gradient(135deg, {{ $postTag->theme_color }}, {{ $postTag->theme_color }}dd);">
                                                {{ $postTag->name }}
                                            </a>
                                        @endforeach
                                    </div>

                                    <h4 class="mb-2"
                                        style="font-family: 'Playfair Display', serif; color: var(--text-primary);">
                                        <a href="{{route('blog.show', $post->slug)}}"
                                           class="text-decoration-none"
                                           style="color: inherit;">
                                            {{ $post->title }}
                                        </a>
                                    </h4>

                                    <p class="mb-3" style="color: var(--text-secondary); line-height: 1.6;">
                                        {{ Str::limit($post->content, 150) }}
                                    </p>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{route('blog.show', $post->slug)}}"
                                           class="btn btn-balanced-outline btn-sm">
                                            <i class="fas fa-arrow-right me-1"></i>
                                            {{ __('posts.button_read_more') }}
                                        </a>
                                        <small style="color: var(--text-muted);">
                                            <i class="fas fa-calendar me-1"></i>
                                            {{ $post->created_at->format('M d, Y') }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            @else
                <div class="content-card text-center py-5">
                    @if(isset($tag))
                        <i class="fas fa-search fa-3x mb-3" style="color: var(--text-muted);"></i>
                        <h3>{{ __('posts.no_posts_found') }}</h3>
                        <p style="color: var(--text-secondary);">
                            {{ __('posts.no_posts_found_for', ['tag' => $tag->name]) }}
                        </p>
                        <a href="{{ route('blog.index') }}" class="btn btn-balanced-outline">
                            <i class="fas fa-arrow-left me-2"></i>
                            {{ __('posts.button_view_all') }}
                        </a>
                    @else
                        <i class="fas fa-pen-fancy fa-3x mb-3" style="color: var(--text-muted);"></i>
                        <h3>{{ __('posts.no_posts_yet') }}</h3>
                        <p style="color: var(--text-secondary);">{{ __('posts.start_sharing') }}</p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Filter by Tags -->
            <div class="sidebar-card">
                <h5 class="mb-3" style="color: var(--text-primary); font-weight: 600;">
                    <i class="fas fa-filter me-2" style="color: var(--primary-color);"></i>
                    {{ __('posts.filter_by_topic') }}
                </h5>

                @if($allTags->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-sm filter-table">
                            <thead>
                            <tr>
                                <th>{{ __('posts.topic') }}</th>
                                <th class="text-center">{{ __('posts.posts') }}</th>
                                <th class="text-center">{{ __('posts.color') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="{{ !isset($tag) ? 'table-active' : '' }}">
                                <td>
                                    <a href="{{ route('blog.index') }}"
                                       class="text-decoration-none fw-semibold"
                                       style="color: var(--text-primary);">
                                        <i class="fas fa-home me-2"></i>
                                        {{ __('posts.all_posts') }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <span class="post-count-badge">{{ $posts->count() }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="tag-color-dot" style="background: var(--primary-color);"></span>
                                </td>
                            </tr>
                            @foreach($allTags as $sidebarTag)
                                <tr class="{{ isset($tag) && $tag->id === $sidebarTag->id ? 'table-active' : '' }}">
                                    <td>
                                        <a href="{{ route('blog.filterByTag', $sidebarTag->slug) }}"
                                           class="text-decoration-none"
                                           style="color: var(--text-primary);">
                                            {{ $sidebarTag->name }}
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <span class="post-count-badge">{{ $sidebarTag->posts_count }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="tag-color-dot"
                                              style="background: {{ $sidebarTag->theme_color }};"></span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            <!-- Blog Stats -->
            <div class="sidebar-card">
                <h5 class="mb-3" style="color: var(--text-primary); font-weight: 600;">
                    <i class="fas fa-chart-bar me-2" style="color: var(--primary-color);"></i>
                    {{ __('posts.blog_stats') }}
                </h5>
                <div class="row">
                    <div class="col-6">
                        <div class="stats-card">
                            <div class="stats-number">{{ $posts->count() }}</div>
                            <small style="color: var(--text-third);">{{ __('posts.total_posts') }}</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stats-card">
                            <div class="stats-number">{{ $allTags->count() }}</div>
                            <small style="color: var(--text-third);">{{ __('posts.total_topics') }}</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Popular Topics -->
            @if($allTags->count() > 0)
                <div class="sidebar-card">
                    <h5 class="mb-3" style="color: var(--text-primary); font-weight: 600;">
                        <i class="fas fa-fire me-2" style="color: var(--primary-color);"></i>
                        {{ __('posts.popular_topics') }}
                    </h5>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($allTags->sortByDesc('posts_count')->take(6) as $popularTag)
                            <a href="{{ route('blog.filterByTag', $popularTag->slug) }}"
                               class="tag-badge"
                               style="background: linear-gradient(135deg, {{ $popularTag->theme_color }}, {{ $popularTag->theme_color }}cc);">
                                {{ $popularTag->name }}
                                <span class="ms-1 small">({{ $popularTag->posts_count }})</span>
                            </a>
                        @endforeach
                    </div>
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

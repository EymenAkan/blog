@extends('frontend.layouts.app')

@php
    // Only apply tag colors when filtering by a specific tag
    $activeTagColor = null;
    $activeTagColorDark = null;
    $activeTagColorLight = null;
    $hasTagTheme = false;
    $showTagBanner = true; // Show banner on index page

    if (isset($tag)) {
        $hasTagTheme = true;
        $activeTagColor = $tag->theme_color;
        // Create darker variant
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

    // Get all tags with post counts for the sidebar
    $allTags = \App\Models\Tag::withCount('posts')->orderBy('name')->get();
@endphp

@section('title', isset($tag) ? $tag->name . ' Posts - Eymen\'s Blog' : 'Eymen\'s Blog')

@section('hero')
    <div class="text-center">
        @if(isset($tag))
            <h1 class="hero-title">{{ $tag->name }}</h1>
            <p class="hero-subtitle">{{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} found</p>
        @else
            <h1 class="hero-title">Welcome to My Blog</h1>
            <p class="hero-subtitle">Personal thoughts, experiences, and discoveries</p>
        @endif

        <a href="{{ route('posts.create') }}" class="btn btn-clean btn-lg">
            <i class="fas fa-pen me-2"></i>
            Write New Post
        </a>
    </div>
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            @if (count($posts) > 0)
                @foreach ($posts as $post)
                    <article class="content-card">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img class="img-fluid w-100"
                                     style="object-fit: cover; height: 200px; border-radius: 8px;"
                                     src="{{ asset('frontend/assets/img/'.$post->image)}}"
                                     alt="{{ $post->title }}">
                            </div>
                            <div class="col-md-8">
                                <div class="p-3">
                                    <div class="mb-2">
                                        @foreach ($post->tags as $postTag)
                                            <a href="{{ route('posts.filterByTag', $postTag->slug) }}"
                                               class="tag-badge-clean"
                                               @if(isset($tag) && $tag->id === $postTag->id)
                                                   style="background: {{ $postTag->theme_color }}; color: white; border-color: {{ $postTag->theme_color }};"
                                                @endif>
                                                {{ $postTag->name }}
                                            </a>
                                        @endforeach
                                    </div>

                                    <h4 class="mb-2">
                                        <a href="{{route('post.show', $post->id)}}"
                                           class="text-decoration-none"
                                           style="color: var(--text-primary);">
                                            {{ $post->title }}
                                        </a>
                                    </h4>

                                    <p class="text-muted mb-3" style="color: var(--text-secondary);">
                                        {{ Str::limit($post->description, 150) }}
                                    </p>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{route('post.show', $post->id)}}"
                                           class="btn btn-clean-outline btn-sm">
                                            <i class="fas fa-arrow-right me-1"></i>
                                            Read More
                                        </a>
                                        <small class="text-muted">
                                            <i class="fas fa-calendar me-1"></i>
                                            {{ $post->created_at->format('M d, Y') }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach

                <!-- Pagination if you have it -->
                @if(method_exists($posts, 'links'))
                    <div class="d-flex justify-content-center mt-4">
                        {{ $posts->links() }}
                    </div>
                @endif

            @else
                <div class="content-card text-center py-5">
                    @if(isset($tag))
                        <i class="fas fa-search fa-3x mb-3" style="color: var(--text-muted);"></i>
                        <h3>No Posts Found</h3>
                        <p style="color: var(--text-secondary);">No posts found with the tag "{{ $tag->name }}"</p>
                        <a href="{{ route('posts.index') }}" class="btn btn-clean-outline">
                            <i class="fas fa-arrow-left me-2"></i>
                            View All Posts
                        </a>
                    @else
                        <i class="fas fa-pen-fancy fa-3x mb-3" style="color: var(--text-muted);"></i>
                        <h3>No Posts Yet</h3>
                        <p style="color: var(--text-secondary);">Start sharing your thoughts and experiences!</p>
                        <a href="{{ route('posts.create') }}" class="btn btn-clean">
                            <i class="fas fa-plus me-2"></i>
                            Write First Post
                        </a>
                    @endif
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Filter by Tags -->
            <div class="sidebar-card">
                <h5 class="mb-3">
                    <i class="fas fa-filter me-2"></i>
                    Filter by Topic
                </h5>

                @if($allTags->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-sm filter-table">
                            <thead>
                            <tr>
                                <th>Topic</th>
                                <th class="text-center">Posts</th>
                                <th class="text-center">Color</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="{{ !isset($tag) ? 'table-active' : '' }}">
                                <td>
                                    <a href="{{ route('posts.index') }}"
                                       class="text-decoration-none fw-semibold"
                                       style="color: var(--text-primary);">
                                        <i class="fas fa-home me-2"></i>
                                        All Posts
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
                                        <a href="{{ route('posts.filterByTag', $sidebarTag->slug) }}"
                                           class="text-decoration-none"
                                           style="color: var(--text-primary);">
                                            {{ $sidebarTag->name }}
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <span class="post-count-badge">{{ $sidebarTag->posts_count }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="tag-color-dot" style="background: {{ $sidebarTag->theme_color }};"></span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted text-center py-3">
                        <i class="fas fa-tags fa-2x mb-2 d-block"></i>
                        No tags created yet
                    </p>
                @endif
            </div>

            <!-- Quick Stats -->
            <div class="sidebar-card">
                <h5 class="mb-3">
                    <i class="fas fa-chart-bar me-2"></i>
                    Blog Stats
                </h5>
                <div class="row text-center">
                    <div class="col-6">
                        <div class="p-2">
                            <h4 class="mb-1" style="color: var(--primary-color);">{{ $posts->count() }}</h4>
                            <small style="color: var(--text-secondary);">Total Posts</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-2">
                            <h4 class="mb-1" style="color: var(--primary-color);">{{ $allTags->count() }}</h4>
                            <small style="color: var(--text-secondary);">Topics</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Tags -->
            @if($allTags->count() > 0)
                <div class="sidebar-card">
                    <h5 class="mb-3">
                        <i class="fas fa-clock me-2"></i>
                        Popular Topics
                    </h5>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($allTags->sortByDesc('posts_count')->take(6) as $popularTag)
                            <a href="{{ route('posts.filterByTag', $popularTag->slug) }}"
                               class="tag-badge-clean"
                               style="background: {{ $popularTag->theme_color }}20; color: {{ $popularTag->theme_color }}; border-color: {{ $popularTag->theme_color }};">
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

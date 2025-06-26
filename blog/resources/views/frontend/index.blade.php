@extends('layouts.app')

@section('title', __('home.title'))

@section('hero')
    <div class="row align-items-center">
        <div class="col-lg-6 text-center text-lg-start">
            <h1 class="hero-title mb-3">
                {{__('home.hero_hi', ['name' => __('common.student_name')])}}
            </h1>
            <p class="hero-subtitle mb-4">
                <i class="fas fa-graduation-cap me-2"></i>
                {{__('home.hero_subtitle')}}
            </p>
            <p class="mb-4" style="font-size: 1.1rem; opacity: 0.9; line-height: 1.6;">
                {!!__('home.hero_subtitle_description')!!}
            </p>
            <div class="d-flex gap-3 justify-content-center justify-content-lg-start flex-wrap">
                <a href="{{ route('blog.index') }}" class="btn btn-balanced btn-lg">
                    <i class="fas fa-code me-2"></i>
                    {{__('home.button_view_project')}}
                </a>
                <a href="#what-i-learned" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-lightbulb me-2"></i>
                    {{__('home.button_view_learned')}}
                </a>
            </div>
        </div>
        <div class="col-lg-6 text-center mt-4 mt-lg-0">
            <div class="hero-image-container">
                <img src="{{ asset('frontend/assets/img/student-coding.svg') }}"
                     alt="{{__('common.student_name')}} Learning to Code"
                     class="img-fluid"
                     style="max-width: 400px; filter: drop-shadow(0 10px 20px rgba(0,0,0,0.1));">
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="mb-5">
        <div class="text-center mb-4">
            <h2 class="section-title">{{__('home.project_overview_title')}}</h2>
            <p class="section-subtitle">{{__('home.project_overview_subtitle')}}</p>
        </div>
        <div class="row text-center">
            <div class="col-md-3 col-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon mb-2">
                        <i class="fas fa-file-alt fa-2x" style="color: var(--primary-color);"></i>
                    </div>
                    <div class="stat-number">{{ $stats['total_posts'] }}</div>
                    <div class="stat-label">{{__('home.stat_post_number')}}</div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon mb-2">
                        <i class="fas fa-tags fa-2x" style="color: var(--accent-color);"></i>
                    </div>
                    <div class="stat-number">{{ $stats['total_tags'] }}</div>
                    <div class="stat-label">{{__('home.stat_post_categories_number')}}</div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon mb-2">
                        <i class="fas fa-tools fa-2x" style="color: var(--secondary-color);"></i>
                    </div>
                    <div class="stat-number">{{ count(__('common.technologies_used')) }}</div>
                    <div class="stat-label">{{__('home.stat_post_technology_number')}}</div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon mb-2">
                        <i class="fas fa-clock fa-2x" style="color: var(--success-color);"></i>
                    </div>
                    <div class="stat-number">{{__('common.project_time_week_number')}}</div>
                    <div class="stat-label">{{__('home.stat_post_how_many_week_passed_text')}}</div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-5">
        <div class="text-center mb-4">
            <h2 class="section-title">{{__('home.posts_content_title')}}</h2>
            <p class="section-subtitle">{{__('home.posts_content_subtitle')}}</p>
        </div>

        @if($recentPosts->count() > 0)
            <div class="row">
                @foreach($recentPosts->take(3) as $post)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <article class="project-card">
                            <div class="project-card-image">
                                <img src="{{ asset('frontend/assets/img/'.$post->image) }}"
                                     alt="{{ $post->title }}"
                                     class="img-fluid">
                                <div class="project-card-overlay">
                                    <a href="{{ route('blog.show', $post) }}" class="btn btn-balanced btn-sm">
                                        <i class="fas fa-eye me-1"></i>
                                        {{__('home.button_view_post')}}
                                    </a>
                                </div>
                            </div>
                            <div class="project-card-content">
                                <div class="mb-2">
                                    @foreach($post->tags->take(2) as $tag)
                                        <span class="tag-badge-small" style="background: {{ $tag->theme_color }};">
                                        {{ $tag->name }}
                                    </span>
                                    @endforeach
                                </div>
                                <h5 class="project-card-title">
                                    <a href="{{ route('blog.show', $post) }}" class="text-decoration-none">
                                        {{ Str::limit($post->title, 60) }}
                                    </a>
                                </h5>
                                <p class="project-card-excerpt">
                                    {{ Str::limit($post->content, 100) }}
                                </p>
                                <div class="project-card-meta">
                                    <small>
                                        <i class="fas fa-calendar me-1"></i>
                                        {{ $post->created_at->format('M d, Y') }}
                                    </small>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>

            <div class="text-center">
                <a href="{{ route('blog.index') }}" class="btn btn-balanced-outline btn-lg">
                    <i class="fas fa-folder-open me-2"></i>
                    {{__('home.button_view_all_posts')}}
                </a>
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-code fa-3x mb-3" style="color: var(--text-muted);"></i>
                <h4>{{__('home.post_error_title')}}</h4>
                <p style="color: var(--text-secondary);">{{__('home.post_error_subtitle')}}</p>
                <small class="text-muted">{{__('common.demo_content_notice')}}</small>
            </div>
        @endif
    </section>

    <section id="what-i-learned" class="mb-5">
        <div class="text-center mb-4">
            <h2 class="section-title">{{__('home.benefits_title')}}</h2>
            <p class="section-subtitle">{{__('home.benefits_subtitle')}}</p>
        </div>

        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="learning-card">
                    <div class="learning-header">
                        <i class="fas fa-server fa-2x mb-3" style="color: var(--primary-color);"></i>
                        <h4>{{__('home.benefits_left_table_title')}}</h4>
                        <p class="text-muted">{{__('home.benefits_left_table_subtitle')}}</p>
                    </div>
                    <div class="learning-list">
                        <div class="learning-item">
                            <div class="learning-icon">
                                <i class="fab fa-laravel" style="color: #ff2d20;"></i>
                            </div>
                            <div class="learning-details">
                                <h6>{{__('home.benefits_left_table_one_title')}}</h6>
                                <small>{{__('home.benefits_left_table_one_subtitle')}}</small>
                            </div>
                        </div>
                        <div class="learning-item">
                            <div class="learning-icon">
                                <i class="fas fa-database" style="color: #336791;"></i>
                            </div>
                            <div class="learning-details">
                                <h6>{{__('home.benefits_left_table_two_title')}}</h6>
                                <small>{{__('home.benefits_left_table_two_subtitle')}}</small>
                            </div>
                        </div>
                        <div class="learning-item">
                            <div class="learning-icon">
                                <i class="fas fa-code" style="color: #777bb4;"></i>
                            </div>
                            <div class="learning-details">
                                <h6>{{__('home.benefits_left_table_three_title')}}</h6>
                                <small>{{__('home.benefits_left_table_three_subtitle')}}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="learning-card">
                    <div class="learning-header">
                        <i class="fas fa-puzzle-piece fa-2x mb-3" style="color: var(--accent-color);"></i>
                        <h4>{{__('home.benefits_right_table_title')}}</h4>
                        <p class="text-muted">{{__('home.benefits_right_table_subtitle')}}</p>
                    </div>
                    <div class="learning-list">
                        <div class="learning-item">
                            <div class="learning-icon">
                                <i class="fab fa-html5" style="color: #e34f26;"></i>
                            </div>
                            <div class="learning-details">
                                <h6>{{__('home.benefits_right_table_one_title')}}</h6>
                                <small>{{__('home.benefits_right_table_one_subtitle')}}</small>
                            </div>
                        </div>
                        <div class="learning-item">
                            <div class="learning-icon">
                                <i class="fab fa-bootstrap" style="color: #7952b3;"></i>
                            </div>
                            <div class="learning-details">
                                <h6>{{__('home.benefits_right_table_two_title')}}</h6>
                                <small>{{__('home.benefits_right_table_two_subtitle')}}</small>
                            </div>
                        </div>
                        <div class="learning-item">
                            <div class="learning-icon">
                                <i class="fab fa-git-alt" style="color: #f05032;"></i>
                            </div>
                            <div class="learning-details">
                                <h6>{{__('home.benefits_right_table_three_title')}}</h6>
                                <small>{{__('home.benefits_right_table_three_subtitle')}}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="implementation-card">
                    <h4 class="text-center mb-4" style="color: var(--text-primary);">
                        <i class="fas fa-wrench me-2" style="color: var(--primary-color);"></i>
                        {{__('home.benefits_under_table_title')}}
                    </h4>
                    <div class="row">
                        <div class="col-md-6">
                            <h6 style="color: var(--primary-color);">
                                <i class="fas fa-check-circle me-2"></i>
                                {{__('home.benefits_under_table_left_title')}}
                            </h6>
                            <ul class="feature-list">
                                <li>{{__('home.benefits_under_table_left_one')}}</li>
                                <li>{{__('home.benefits_under_table_left_two')}}</li>
                                <li>{{__('home.benefits_under_table_left_three')}}</li>
                                <li>{{__('home.benefits_under_table_left_four')}}</li>
                                <li>{{__('home.benefits_under_table_left_five')}}</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6 style="color: var(--primary-color);">
                                <i class="fas fa-lightbulb me-2"></i>
                                {{__('home.benefits_under_table_right_title')}}
                            </h6>
                            <ul class="feature-list">
                                <li>{{__('home.benefits_under_table_right_one')}}</li>
                                <li>{{__('home.benefits_under_table_right_two')}}</li>
                                <li>{{__('home.benefits_under_table_right_three')}}</li>
                                <li>{{__('home.benefits_under_table_right_four')}}</li>
                                <li>{{__('home.benefits_under_table_right_five')}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-5">
        <div class="text-center mb-4">
            <h2 class="section-title">{{__('home.education_title')}}</h2>
            <p class="section-subtitle">{{__('home.education_subtitle')}}</p>
        </div>

        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="journey-card current">
                    <div class="journey-icon">
                        <i class="fas fa-graduation-cap fa-2x" style="color: var(--primary-color);"></i>
                    </div>
                    <h5>{{__('home.education_left_table_title')}}</h5>
                    <ul class="journey-list">
                        <li>{{__('home.education_left_table_one')}}</li>
                        <li>{{__('home.education_left_table_two')}}</li>
                        <li>{{__('home.education_left_table_three')}}</li>
                        <li>{{__('home.education_left_table_four')}}</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="journey-card">
                    <div class="journey-icon">
                        <i class="fas fa-target fa-2x" style="color: var(--accent-color);"></i>
                    </div>
                    <h5>{{__('home.education_middle_table_title')}}</h5>
                    <ul class="journey-list">
                        <li>{{__('home.education_middle_table_one')}}</li>
                        <li>{{__('home.education_middle_table_two')}}</li>
                        <li>{{__('home.education_middle_table_three')}}</li>
                        <li>{{__('home.education_middle_table_four')}}</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="journey-card">
                    <div class="journey-icon">
                        <i class="fas fa-rocket fa-2x" style="color: var(--secondary-color);"></i>
                    </div>
                    <h5>{{__('home.education_right_table_title')}}</h5>
                    <ul class="journey-list">
                        <li>{{__('home.education_right_table_one')}}</li>
                        <li>{{__('home.education_right_table_two')}}</li>
                        <li>{{__('home.education_right_table_three')}}</li>
                        <li>{{__('home.education_right_table_four')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    @if($popularTags->count() > 0)
        <section class="mb-5">
            <div class="text-center mb-4">
                <h2 class="section-title">{{__('home.categories_title')}}</h2>
                <p class="section-subtitle">{{__('home.categories_subtitle')}}</p>
            </div>

            <div class="demo-grid">
                @foreach($popularTags as $tag)
                    <a href="{{ route('blog.filterByTag', $tag->slug) }}"
                       class="demo-card"
                       style="--demo-color: {{ $tag->theme_color }};">
                        <div class="demo-content">
                            <h6>{{ $tag->name }}</h6>
                            <span class="demo-count">{{ $tag->posts_count }} {{ Str::plural('post', $tag->posts_count) }}</span>
                        </div>
                        <div class="demo-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    @endif

    <section class="cta-section">
        <div class="text-center">
            <h2 class="mb-3" style="color: white; font-family: 'Playfair Display', serif;">
                {{__('home.code_sharing_title')}}
            </h2>
            <p class="mb-4" style="color: rgba(255,255,255,0.9); font-size: 1.1rem;">
                {{__('home.code_sharing_content')}}
            </p>
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="{{ route('blog.index') }}" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-code me-2"></i>
                    {{__('home.code_sharing_link')}}
                </a>
                <a href="{{ route('about') }}" class="btn btn-balanced btn-lg"
                   style="background: white; color: var(--primary-color);">
                    <i class="fas fa-user me-2"></i>
                    {{__('home.code_sharing_button_about_me')}}
                </a>
            </div>
        </div>
    </section>

    <!-- Learning Project Notice -->
    <div class="text-center mt-4">
        <small class="text-muted">
            <i class="fas fa-info-circle me-1"></i>
            {{__('common.student_disclaimer')}}
        </small>
    </div>
@endsection

@push('styles')
    <style>
        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .section-subtitle {
            color: var(--text-secondary);
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--bg-primary);
            border-radius: 12px;
            padding: 1.5rem 1rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            font-family: 'Playfair Display', serif;
        }

        .stat-label {
            color: var(--text-secondary);
            font-size: 0.9rem;
            font-weight: 500;
        }

        .project-card {
            background: var(--bg-primary);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            height: 100%;
        }

        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .project-card-image {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .project-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .project-card:hover .project-card-image img {
            transform: scale(1.05);
        }

        .project-card-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .project-card:hover .project-card-overlay {
            opacity: 1;
        }

        .project-card-content {
            padding: 1.5rem;
        }

        .project-card-title a {
            color: var(--text-primary);
            font-weight: 600;
            line-height: 1.4;
        }

        .project-card-title a:hover {
            color: var(--primary-color);
        }

        .project-card-excerpt {
            color: var(--text-secondary);
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .project-card-meta {
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        .tag-badge-small {
            color: white;
            padding: 0.2rem 0.6rem;
            border-radius: 12px;
            font-size: 0.7rem;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            margin-right: 0.5rem;
        }

        .learning-card {
            background: var(--bg-primary);
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--border-color);
            height: 100%;
        }

        .learning-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .learning-header h4 {
            color: var(--text-primary);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .learning-list {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .learning-item {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .learning-icon {
            font-size: 2rem;
            width: 50px;
            text-align: center;
        }

        .learning-details h6 {
            margin-bottom: 0.25rem;
            color: var(--text-primary);
            font-weight: 600;
        }

        .learning-details small {
            color: var(--text-secondary);
        }

        .implementation-card {
            background: var(--bg-primary);
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--border-color);
        }

        .feature-list {
            list-style: none;
            padding: 0;
        }

        .feature-list li {
            color: var(--text-secondary);
            margin-bottom: 0.5rem;
            padding-left: 1rem;
            position: relative;
        }

        .feature-list li::before {
            content: '→';
            position: absolute;
            left: 0;
            color: var(--primary-color);
            font-weight: bold;
        }

        .journey-card {
            background: var(--bg-primary);
            border-radius: 12px;
            padding: 2rem 1.5rem;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            height: 100%;
        }

        .journey-card.current {
            border-color: var(--primary-color);
            background: linear-gradient(135deg, var(--primary-color) 05, var(--accent-color) 05);
        }

        .journey-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .journey-card h5 {
            color: var(--text-primary);
            margin: 1rem 0;
            font-weight: 600;
        }

        .journey-list {
            list-style: none;
            padding: 0;
            text-align: left;
        }

        .journey-list li {
            color: var(--text-secondary);
            margin-bottom: 0.5rem;
            padding-left: 1rem;
            position: relative;
        }

        .journey-list li::before {
            content: '•';
            position: absolute;
            left: 0;
            color: var(--primary-color);
            font-weight: bold;
        }

        .demo-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
        }

        .demo-card {
            background: var(--bg-primary);
            border-radius: 12px;
            padding: 1.5rem;
            text-decoration: none;
            color: var(--text-primary);
            border: 2px solid transparent;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .demo-card:hover {
            color: var(--demo-color);
            border-color: var(--demo-color);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .demo-content h6 {
            margin-bottom: 0.25rem;
            font-weight: 600;
        }

        .demo-count {
            font-size: 0.85rem;
            color: var(--text-secondary);
        }

        .demo-arrow {
            font-size: 1.2rem;
            opacity: 0.5;
            transition: all 0.3s ease;
        }

        .demo-card:hover .demo-arrow {
            opacity: 1;
            transform: translateX(5px);
        }

        .cta-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 16px;
            padding: 4rem 2rem;
            margin: 3rem 0;
        }

        .hero-image-container {
            position: relative;
        }

        .hero-image-container::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 20px;
            right: -20px;
            bottom: -20px;
            background: linear-gradient(135deg, var(--primary-color) 20, var(--accent-color) 20);
            border-radius: 20px;
            z-index: -1;
        }

        @media (max-width: 768px) {
            .section-title {
                font-size: 1.8rem;
            }

            .stat-card {
                padding: 1rem;
            }

            .stat-number {
                font-size: 1.5rem;
            }

            .learning-card {
                padding: 1.5rem;
            }

            .implementation-card {
                padding: 1.5rem;
            }

            .journey-card {
                padding: 1.5rem 1rem;
            }

            .cta-section {
                padding: 2rem 1rem;
            }

            .demo-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

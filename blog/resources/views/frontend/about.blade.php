@extends('layouts.app')

@section('title', __('about.title'))

@section('hero')
    <div class="text-center">
        <div class="mb-4">
            <img src="{{ asset('frontend/assets/img/student-profile.jpg') }}"
                 alt="{{__('about.alt_profile_image')}}"
                 class="rounded-circle"
                 style="width: 120px; height: 120px; object-fit: cover; border: 4px solid rgba(255,255,255,0.3);">
        </div>
        <h1 class="hero-title">{{__('about.hero_title', ['name' => __('common.student_name')])}}</h1>
        <p class="hero-subtitle">
            <i class="fas fa-graduation-cap me-2"></i>
            {{__('about.hero_subtitle')}}
        </p>
    </div>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Main About Content -->
            <div class="content-card">
                <div class="row">
                    <div class="col-md-4 text-center mb-4 mb-md-0">
                        <img src="{{ asset('frontend/assets/img/student-workspace.jpg') }}"
                             alt="{{__('about.alt_workspace_image')}}"
                             class="img-fluid rounded-3 mb-3"
                             style="max-width: 250px;">

                        <!-- Learning Stats -->
                        <div class="stats-grid">
                            <div class="stat-item">
                                <div class="stat-number">{{__('common.student_year')}}</div>
                                <div class="stat-label">{{__('about.stat_year_student', ['year' => __('common.student_year')])}}</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">{{ \App\Models\Post::count() }}</div>
                                <div class="stat-label">{{__('about.stat_demo_posts')}}</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">{{__('common.project_time_week_number')}}</div>
                                <div class="stat-label">{{__('about.stat_weeks_learning')}}</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="about-content">
                            <h2 class="mb-4" style="font-family: 'Playfair Display', serif; color: var(--text-primary);">
                                {{__('about.main_title')}}
                            </h2>

                            <p class="lead mb-4" style="color: var(--text-secondary); font-size: 1.1rem; line-height: 1.7;">
                                {{__('about.main_lead')}}
                            </p>

                            <p class="mb-4" style="color: var(--text-secondary); line-height: 1.7;">
                                {{__('about.main_paragraph_one', ['year' => __('common.student_year')])}}
                            </p>

                            <p class="mb-4" style="color: var(--text-secondary); line-height: 1.7;">
                                {{__('about.main_paragraph_two')}}
                            </p>

                            <div class="highlight-box p-4 mb-4" style="background: linear-gradient(135deg, var(--primary-color)10, var(--accent-color)10); border-left: 4px solid var(--primary-color); border-radius: 8px;">
                                <h4 style="color: var(--primary-color); font-family: 'Playfair Display', serif; margin-bottom: 1rem;">
                                    <i class="fas fa-target me-2"></i>
                                    {{__('about.learning_title')}}
                                </h4>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2" style="color: var(--text-secondary);">
                                        <i class="fas fa-code me-2" style="color: var(--primary-color);"></i>
                                        {{__('about.learning_item_one')}}
                                    </li>
                                    <li class="mb-2" style="color: var(--text-secondary);">
                                        <i class="fas fa-database me-2" style="color: var(--primary-color);"></i>
                                        {{__('about.learning_item_two')}}
                                    </li>
                                    <li class="mb-2" style="color: var(--text-secondary);">
                                        <i class="fas fa-api me-2" style="color: var(--primary-color);"></i>
                                        {{__('about.learning_item_three')}}
                                    </li>
                                    <li class="mb-0" style="color: var(--text-secondary);">
                                        <i class="fas fa-cogs me-2" style="color: var(--primary-color);"></i>
                                        {{__('about.learning_item_four')}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Learning Goals -->
            <div class="content-card">
                <h3 class="mb-4 text-center" style="font-family: 'Playfair Display', serif; color: var(--text-primary);">
                    {{__('about.goals_title')}}
                </h3>
                <div class="row">
                    <div class="col-md-4 text-center mb-4">
                        <div class="goal-card">
                            <div class="goal-icon mb-3">
                                <i class="fas fa-graduation-cap fa-2x" style="color: var(--primary-color);"></i>
                            </div>
                            <h5>{{__('about.goal_graduate_title')}}</h5>
                            <p class="small" style="color: var(--text-secondary);">
                                {{__('about.goal_graduate_description')}}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 text-center mb-4">
                        <div class="goal-card">
                            <div class="goal-icon mb-3">
                                <i class="fas fa-server fa-2x" style="color: var(--primary-color);"></i>
                            </div>
                            <h5>{{__('about.goal_backend_title')}}</h5>
                            <p class="small" style="color: var(--text-secondary);">
                                {{__('about.goal_backend_description')}}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 text-center mb-4">
                        <div class="goal-card">
                            <div class="goal-icon mb-3">
                                <i class="fas fa-briefcase fa-2x" style="color: var(--primary-color);"></i>
                            </div>
                            <h5>{{__('about.goal_job_title')}}</h5>
                            <p class="small" style="color: var(--text-secondary);">
                                {{__('about.goal_job_description')}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fun Facts -->
            <div class="content-card">
                <h3 class="mb-4" style="font-family: 'Playfair Display', serif; color: var(--text-primary);">
                    <i class="fas fa-smile me-2" style="color: var(--primary-color);"></i>
                    {{__('about.fun_facts_title')}}
                </h3>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <li class="mb-3 d-flex align-items-start">
                                <i class="fas fa-coffee me-3 mt-1" style="color: var(--primary-color);"></i>
                                <span style="color: var(--text-secondary);">{{__('about.fun_fact_one')}}</span>
                            </li>
                            <li class="mb-3 d-flex align-items-start">
                                <i class="fas fa-book me-3 mt-1" style="color: var(--primary-color);"></i>
                                <span style="color: var(--text-secondary);">{{__('about.fun_fact_two')}}</span>
                            </li>
                            <li class="mb-3 d-flex align-items-start">
                                <i class="fas fa-gamepad me-3 mt-1" style="color: var(--primary-color);"></i>
                                <span style="color: var(--text-secondary);">{{__('about.fun_fact_three')}}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <li class="mb-3 d-flex align-items-start">
                                <i class="fas fa-users me-3 mt-1" style="color: var(--primary-color);"></i>
                                <span style="color: var(--text-secondary);">{{__('about.fun_fact_four')}}</span>
                            </li>
                            <li class="mb-3 d-flex align-items-start">
                                <i class="fas fa-lightbulb me-3 mt-1" style="color: var(--primary-color);"></i>
                                <span style="color: var(--text-secondary);">{{__('about.fun_fact_five')}}</span>
                            </li>
                            <li class="mb-3 d-flex align-items-start">
                                <i class="fas fa-rocket me-3 mt-1" style="color: var(--primary-color);"></i>
                                <span style="color: var(--text-secondary);">{{__('about.fun_fact_six')}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Contact -->
            <div class="content-card text-center" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); color: white;">
                <h3 class="mb-3" style="font-family: 'Playfair Display', serif;">
                    {{__('about.contact_title')}}
                </h3>
                <p class="mb-4" style="opacity: 0.9;">
                    {{__('about.contact_description')}}
                </p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="mailto:{{__('common.email')}}" class="btn btn-outline-light">
                        <i class="fas fa-envelope me-2"></i>
                        {{__('about.button_email')}}
                    </a>
                    <a href="{{__('common.github_url')}}" class="btn btn-outline-light" target="_blank">
                        <i class="fab fa-github me-2"></i>
                        {{__('about.button_github')}}
                    </a>
                    <a href="{{__('common.linkedin_url')}}" class="btn btn-outline-light" target="_blank">
                        <i class="fab fa-linkedin me-2"></i>
                        {{__('about.button_linkedin')}}
                    </a>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Current Learning -->
            <div class="sidebar-card">
                <h5 class="mb-3" style="color: var(--text-primary); font-weight: 600;">
                    <i class="fas fa-book-open me-2" style="color: var(--primary-color);"></i>
                    {{__('about.sidebar_learning_title')}}
                </h5>
                <ul class="list-unstyled">
                    <li class="mb-2" style="color: var(--text-secondary);">
                        <i class="fas fa-arrow-right me-2" style="color: var(--primary-color);"></i>
                        {{__('about.sidebar_learning_one')}}
                    </li>
                    <li class="mb-2" style="color: var(--text-secondary);">
                        <i class="fas fa-arrow-right me-2" style="color: var(--primary-color);"></i>
                        {{__('about.sidebar_learning_two')}}
                    </li>
                    <li class="mb-2" style="color: var(--text-secondary);">
                        <i class="fas fa-arrow-right me-2" style="color: var(--primary-color);"></i>
                        {{__('about.sidebar_learning_three')}}
                    </li>
                    <li class="mb-2" style="color: var(--text-secondary);">
                        <i class="fas fa-arrow-right me-2" style="color: var(--primary-color);"></i>
                        {{__('about.sidebar_learning_four')}}
                    </li>
                </ul>
            </div>

            <!-- Demo Project Stats -->
            <div class="sidebar-card">
                <h5 class="mb-3" style="color: var(--text-primary); font-weight: 600;">
                    <i class="fas fa-chart-line me-2" style="color: var(--primary-color);"></i>
                    {{__('about.sidebar_stats_title')}}
                </h5>
                @php
                    $projectStats = [
                        'lines_of_code' => '~2,500',
                        'files_created' => '25+',
                        'features_built' => '12',
                        'time_spent' => __('common.project_time_week_number') . ' weeks'
                    ];
                @endphp
                <div class="row">
                    <div class="col-6 mb-3">
                        <div class="mini-stat">
                            <div class="mini-stat-number">{{ $projectStats['lines_of_code'] }}</div>
                            <small>{{__('about.stat_lines_of_code')}}</small>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="mini-stat">
                            <div class="mini-stat-number">{{ $projectStats['features_built'] }}</div>
                            <small>{{__('about.stat_features_built')}}</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Next Projects -->
            <div class="sidebar-card">
                <h5 class="mb-3" style="color: var(--text-primary); font-weight: 600;">
                    <i class="fas fa-rocket me-2" style="color: var(--primary-color);"></i>
                    {{__('about.sidebar_next_projects_title')}}
                </h5>
                <ul class="list-unstyled">
                    <li class="mb-2" style="color: var(--text-secondary);">
                        <i class="fas fa-api me-2" style="color: var(--accent-color);"></i>
                        {{__('about.next_project_one')}}
                    </li>
                    <li class="mb-2" style="color: var(--text-secondary);">
                        <i class="fas fa-shopping-cart me-2" style="color: var(--accent-color);"></i>
                        {{__('about.next_project_two')}}
                    </li>
                    <li class="mb-2" style="color: var(--text-secondary);">
                        <i class="fas fa-comments me-2" style="color: var(--accent-color);"></i>
                        {{__('about.next_project_three')}}
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .goal-card {
            padding: 1.5rem 1rem;
            height: 100%;
            transition: transform 0.3s ease;
        }

        .goal-card:hover {
            transform: translateY(-5px);
        }

        .goal-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--primary-color)15, var(--accent-color)15);
            border-radius: 50%;
        }

        .mini-stat {
            text-align: center;
            padding: 0.75rem;
            background: linear-gradient(135deg, var(--primary-color)10, var(--accent-color)10);
            border-radius: 8px;
        }

        .mini-stat-number {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
            font-family: 'Playfair Display', serif;
        }

        /* Reuse existing styles from previous about page */
        .stats-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
            margin-top: 1rem;
        }

        .stat-item {
            text-align: center;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary-color)10, var(--accent-color)10);
            border-radius: 8px;
        }

        .stat-number {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
            font-family: 'Playfair Display', serif;
        }

        .stat-label {
            font-size: 0.8rem;
            color: var(--text-secondary);
            margin-top: 0.25rem;
        }

        .highlight-box {
            position: relative;
        }

        .highlight-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, var(--primary-color)05, var(--accent-color)05);
            border-radius: 8px;
            z-index: -1;
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 0.5rem;
            }

            .stat-item {
                padding: 0.75rem 0.5rem;
            }

            .stat-number {
                font-size: 1.2rem;
            }

            .stat-label {
                font-size: 0.7rem;
            }

            .goal-card {
                padding: 1rem 0.5rem;
            }
        }
    </style>
@endpush

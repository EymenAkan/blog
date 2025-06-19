@extends('layouts.app')

@section('title', 'About Eymen - Computer Programming Student')

@section('hero')
    <div class="text-center">
        <div class="mb-4">
            <img src="{{ asset('frontend/assets/img/student-profile.jpg') }}"
                 alt="Eymen"
                 class="rounded-circle"
                 style="width: 120px; height: 120px; object-fit: cover; border: 4px solid rgba(255,255,255,0.3);">
        </div>
        <h1 class="hero-title">Hi, I'm Eymen</h1>
        <p class="hero-subtitle">
            <i class="fas fa-graduation-cap me-2"></i>
            Computer Programming Student & Future Backend Developer
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
                             alt="My Learning Setup"
                             class="img-fluid rounded-3 mb-3"
                             style="max-width: 250px;">

                        <!-- Learning Stats -->
                        <div class="stats-grid">
                            <div class="stat-item">
                                <div class="stat-number">2nd</div>
                                <div class="stat-label">Year Student</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">{{ \App\Models\Post::count() }}</div>
                                <div class="stat-label">Demo Posts</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">3</div>
                                <div class="stat-label">Weeks Learning</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="about-content">
                            <h2 class="mb-4" style="font-family: 'Playfair Display', serif; color: var(--text-primary);">
                                My Learning Journey
                            </h2>

                            <p class="lead mb-4" style="color: var(--text-secondary); font-size: 1.1rem; line-height: 1.7;">
                                I'm a computer programming student passionate about backend development. This blog project isn't a real blog - it's my way of practicing and showcasing what I'm learning!
                            </p>

                            <p class="mb-4" style="color: var(--text-secondary); line-height: 1.7;">
                                Currently in my second year of computer programming, I'm focusing on backend technologies like PHP, Laravel, and database design. I chose to build this blog project to practice real-world development skills and understand how web applications work behind the scenes.
                            </p>

                            <p class="mb-4" style="color: var(--text-secondary); line-height: 1.7;">
                                My goal is to become a backend developer after graduation. I love working with databases, APIs, and server-side logic. This project helped me understand MVC architecture, database relationships, and how to build scalable web applications.
                            </p>

                            <div class="highlight-box p-4 mb-4" style="background: linear-gradient(135deg, var(--primary-color)10, var(--accent-color)10); border-left: 4px solid var(--primary-color); border-radius: 8px;">
                                <h4 style="color: var(--primary-color); font-family: 'Playfair Display', serif; margin-bottom: 1rem;">
                                    <i class="fas fa-target me-2"></i>
                                    What I'm Learning
                                </h4>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2" style="color: var(--text-secondary);">
                                        <i class="fas fa-code me-2" style="color: var(--primary-color);"></i>
                                        Backend development with Laravel & PHP
                                    </li>
                                    <li class="mb-2" style="color: var(--text-secondary);">
                                        <i class="fas fa-database me-2" style="color: var(--primary-color);"></i>
                                        Database design and optimization
                                    </li>
                                    <li class="mb-2" style="color: var(--text-secondary);">
                                        <i class="fas fa-api me-2" style="color: var(--primary-color);"></i>
                                        RESTful API development
                                    </li>
                                    <li class="mb-0" style="color: var(--text-secondary);">
                                        <i class="fas fa-cogs me-2" style="color: var(--primary-color);"></i>
                                        Software architecture and best practices
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
                    My Learning Goals
                </h3>
                <div class="row">
                    <div class="col-md-4 text-center mb-4">
                        <div class="goal-card">
                            <div class="goal-icon mb-3">
                                <i class="fas fa-graduation-cap fa-2x" style="color: var(--primary-color);"></i>
                            </div>
                            <h5>Graduate Strong</h5>
                            <p class="small" style="color: var(--text-secondary);">
                                Complete my degree with solid programming fundamentals and practical project experience.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 text-center mb-4">
                        <div class="goal-card">
                            <div class="goal-icon mb-3">
                                <i class="fas fa-server fa-2x" style="color: var(--primary-color);"></i>
                            </div>
                            <h5>Master Backend</h5>
                            <p class="small" style="color: var(--text-secondary);">
                                Become proficient in server-side technologies, databases, and API development.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 text-center mb-4">
                        <div class="goal-card">
                            <div class="goal-icon mb-3">
                                <i class="fas fa-briefcase fa-2x" style="color: var(--primary-color);"></i>
                            </div>
                            <h5>Land First Job</h5>
                            <p class="small" style="color: var(--text-secondary);">
                                Get hired as a junior backend developer and start my professional career.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fun Facts -->
            <div class="content-card">
                <h3 class="mb-4" style="font-family: 'Playfair Display', serif; color: var(--text-primary);">
                    <i class="fas fa-smile me-2" style="color: var(--primary-color);"></i>
                    Fun Facts About Me
                </h3>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <li class="mb-3 d-flex align-items-start">
                                <i class="fas fa-coffee me-3 mt-1" style="color: var(--primary-color);"></i>
                                <span style="color: var(--text-secondary);">I debug best with coffee and lo-fi music</span>
                            </li>
                            <li class="mb-3 d-flex align-items-start">
                                <i class="fas fa-book me-3 mt-1" style="color: var(--primary-color);"></i>
                                <span style="color: var(--text-secondary);">Always watching programming tutorials on YouTube</span>
                            </li>
                            <li class="mb-3 d-flex align-items-start">
                                <i class="fas fa-gamepad me-3 mt-1" style="color: var(--primary-color);"></i>
                                <span style="color: var(--text-secondary);">Gaming helps me think through coding problems</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <li class="mb-3 d-flex align-items-start">
                                <i class="fas fa-users me-3 mt-1" style="color: var(--primary-color);"></i>
                                <span style="color: var(--text-secondary);">Love collaborating on group projects</span>
                            </li>
                            <li class="mb-3 d-flex align-items-start">
                                <i class="fas fa-lightbulb me-3 mt-1" style="color: var(--primary-color);"></i>
                                <span style="color: var(--text-secondary);">Get excited about solving complex problems</span>
                            </li>
                            <li class="mb-3 d-flex align-items-start">
                                <i class="fas fa-rocket me-3 mt-1" style="color: var(--primary-color);"></i>
                                <span style="color: var(--text-secondary);">Dream of working at a tech startup</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Contact -->
            <div class="content-card text-center" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); color: white;">
                <h3 class="mb-3" style="font-family: 'Playfair Display', serif;">
                    Let's Connect!
                </h3>
                <p class="mb-4" style="opacity: 0.9;">
                    I'm always excited to connect with fellow students, developers, or anyone interested in tech.
                    Feel free to reach out if you want to chat about programming, projects, or just say hi!
                </p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="mailto:eymen.akan.job@hotmail.com" class="btn btn-outline-light">
                        <i class="fas fa-envelope me-2"></i>
                        Email Me
                    </a>
                    <a href="https://github.com/EymenAkan" class="btn btn-outline-light">
                        <i class="fab fa-github me-2"></i>
                        GitHub
                    </a>
                    <a href="https://www.linkedin.com/in/eymen-akan/" class="btn btn-outline-light">
                        <i class="fab fa-linkedin me-2"></i>
                        LinkedIn
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
                    Currently Learning
                </h5>
                <ul class="list-unstyled">
                    <li class="mb-2" style="color: var(--text-secondary);">
                        <i class="fas fa-arrow-right me-2" style="color: var(--primary-color);"></i>
                        Advanced Laravel Features
                    </li>
                    <li class="mb-2" style="color: var(--text-secondary);">
                        <i class="fas fa-arrow-right me-2" style="color: var(--primary-color);"></i>
                        API Development
                    </li>
                    <li class="mb-2" style="color: var(--text-secondary);">
                        <i class="fas fa-arrow-right me-2" style="color: var(--primary-color);"></i>
                        Database Optimization
                    </li>
                    <li class="mb-2" style="color: var(--text-secondary);">
                        <i class="fas fa-arrow-right me-2" style="color: var(--primary-color);"></i>
                        Testing with PHPUnit
                    </li>
                </ul>
            </div>

            <!-- Demo Project Stats -->
            <div class="sidebar-card">
                <h5 class="mb-3" style="color: var(--text-primary); font-weight: 600;">
                    <i class="fas fa-chart-line me-2" style="color: var(--primary-color);"></i>
                    Project Stats
                </h5>
                @php
                    $projectStats = [
                        'lines_of_code' => '~2,500',
                        'files_created' => '25+',
                        'features_built' => '12',
                        'time_spent' => '3 weeks'
                    ];
                @endphp
                <div class="row">
                    <div class="col-6 mb-3">
                        <div class="mini-stat">
                            <div class="mini-stat-number">{{ $projectStats['lines_of_code'] }}</div>
                            <small>Lines of Code</small>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="mini-stat">
                            <div class="mini-stat-number">{{ $projectStats['features_built'] }}</div>
                            <small>Features Built</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Next Projects -->
            <div class="sidebar-card">
                <h5 class="mb-3" style="color: var(--text-primary); font-weight: 600;">
                    <i class="fas fa-rocket me-2" style="color: var(--primary-color);"></i>
                    Next Projects
                </h5>
                <ul class="list-unstyled">
                    <li class="mb-2" style="color: var(--text-secondary);">
                        <i class="fas fa-api me-2" style="color: var(--accent-color);"></i>
                        REST API with authentication
                    </li>
                    <li class="mb-2" style="color: var(--text-secondary);">
                        <i class="fas fa-shopping-cart me-2" style="color: var(--accent-color);"></i>
                        E-commerce backend system
                    </li>
                    <li class="mb-2" style="color: var(--text-secondary);">
                        <i class="fas fa-comments me-2" style="color: var(--accent-color);"></i>
                        Multi-User reminder app for roommates and people who are sharing responsibilty together
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

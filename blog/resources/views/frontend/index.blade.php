@extends('layouts.app')

@section('title', 'Eymen - Computer Programming Student')

@section('hero')
    <div class="row align-items-center">
        <div class="col-lg-6 text-center text-lg-start">
            <h1 class="hero-title mb-3">
                Hi, I'm <span style="color: #fbbf24;">Eymen</span>
            </h1>
            <p class="hero-subtitle mb-4">
                <i class="fas fa-graduation-cap me-2"></i>
                Computer Programming Student & Aspiring Backend Developer
            </p>
            <p class="mb-4" style="font-size: 1.1rem; opacity: 0.9; line-height: 1.6;">
                This blog is my <strong>learning project</strong> built with Laravel to practice
                backend development skills. It's not a real blog - just a way to showcase
                what I've learned in my programming journey!
            </p>
            <div class="d-flex gap-3 justify-content-center justify-content-lg-start flex-wrap">
                <a href="{{ route('posts.index') }}" class="btn btn-balanced btn-lg">
                    <i class="fas fa-cogde me-2"></i>
                    View Project
                </a>
                <a href="#what-i-learned" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-lightbulb me-2"></i>
                    What I Learned
                </a>
            </div>
        </div>
        <div class="col-lg-6 text-center mt-4 mt-lg-0">
            <div class="hero-image-container">
                <img src="{{ asset('frontend/assets/img/student-coding.svg') }}"
                     alt="Student Learning to Code"
                     class="img-fluid"
                     style="max-width: 400px; filter: drop-shadow(0 10px 20px rgba(0,0,0,0.1));">
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="mb-5">
        <div class="text-center mb-4">
            <h2 class="section-title">Project Overview</h2>
            <p class="section-subtitle">What I built while learning Laravel</p>
        </div>
        <div class="row text-center">
            <div class="col-md-3 col-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon mb-2">
                        <i class="fas fa-file-alt fa-2x" style="color: var(--primary-color);"></i>
                    </div>
                    <div class="stat-number">{{ $stats['total_posts'] }}</div>
                    <div class="stat-label">Sample Posts</div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon mb-2">
                        <i class="fas fa-tags fa-2x" style="color: var(--accent-color);"></i>
                    </div>
                    <div class="stat-number">{{ $stats['total_tags'] }}</div>
                    <div class="stat-label">Categories</div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon mb-2">
                        <i class="fas fa-tools fa-2x" style="color: var(--secondary-color);"></i>
                    </div>
                    <div class="stat-number">8</div>
                    <div class="stat-label">Technologies</div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon mb-2">
                        <i class="fas fa-clock fa-2x" style="color: var(--success-color);"></i>
                    </div>
                    <div class="stat-number">3</div>
                    <div class="stat-label">Weeks Built</div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-5">
        <div class="text-center mb-4">
            <h2 class="section-title">Sample Content</h2>
            <p class="section-subtitle">Demo posts I created to test the functionality</p>
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
                                        View Post
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
                <a href="{{ route('posts.index') }}" class="btn btn-balanced-outline btn-lg">
                    <i class="fas fa-folder-open me-2"></i>
                    View All Demo Content
                </a>
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-code fa-3x mb-3" style="color: var(--text-muted);"></i>
                <h4>Project in Development</h4>
                <p style="color: var(--text-secondary);">Still working on adding demo content!</p>
            </div>
        @endif
    </section>

    <section id="what-i-learned" class="mb-5">
        <div class="text-center mb-4">
            <h2 class="section-title">What I Learned Building This</h2>
            <p class="section-subtitle">Backend development skills I practiced</p>
        </div>

        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="learning-card">
                    <div class="learning-header">
                        <i class="fas fa-server fa-2x mb-3" style="color: var(--primary-color);"></i>
                        <h4>Backend Development</h4>
                        <p class="text-muted">My main focus area</p>
                    </div>
                    <div class="learning-list">
                        <div class="learning-item">
                            <div class="learning-icon">
                                <i class="fab fa-laravel" style="color: #ff2d20;"></i>
                            </div>
                            <div class="learning-details">
                                <h6>Laravel Framework</h6>
                                <small>MVC architecture, routing, middleware</small>
                            </div>
                        </div>
                        <div class="learning-item">
                            <div class="learning-icon">
                                <i class="fas fa-database" style="color: #336791;"></i>
                            </div>
                            <div class="learning-details">
                                <h6>Database Design</h6>
                                <small>MySQL, migrations, relationships</small>
                            </div>
                        </div>
                        <div class="learning-item">
                            <div class="learning-icon">
                                <i class="fas fa-code" style="color: #777bb4;"></i>
                            </div>
                            <div class="learning-details">
                                <h6>PHP Programming</h6>
                                <small>OOP concepts, Eloquent ORM</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="learning-card">
                    <div class="learning-header">
                        <i class="fas fa-puzzle-piece fa-2x mb-3" style="color: var(--accent-color);"></i>
                        <h4>Supporting Skills</h4>
                        <p class="text-muted">What I picked up along the way</p>
                    </div>
                    <div class="learning-list">
                        <div class="learning-item">
                            <div class="learning-icon">
                                <i class="fab fa-html5" style="color: #e34f26;"></i>
                            </div>
                            <div class="learning-details">
                                <h6>Blade Templates</h6>
                                <small>Laravel's templating engine</small>
                            </div>
                        </div>
                        <div class="learning-item">
                            <div class="learning-icon">
                                <i class="fab fa-bootstrap" style="color: #7952b3;"></i>
                            </div>
                            <div class="learning-details">
                                <h6>Bootstrap CSS</h6>
                                <small>Responsive design basics</small>
                            </div>
                        </div>
                        <div class="learning-item">
                            <div class="learning-icon">
                                <i class="fab fa-git-alt" style="color: #f05032;"></i>
                            </div>
                            <div class="learning-details">
                                <h6>Version Control</h6>
                                <small>Git for project management</small>
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
                        Technical Implementation
                    </h4>
                    <div class="row">
                        <div class="col-md-6">
                            <h6 style="color: var(--primary-color);">
                                <i class="fas fa-check-circle me-2"></i>
                                Backend Features I Built
                            </h6>
                            <ul class="feature-list">
                                <li>RESTful API routes for CRUD operations</li>
                                <li>Database relationships (Many-to-Many)</li>
                                <li>Form validation and error handling</li>
                                <li>File upload functionality</li>
                                <li>Dynamic content filtering</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6 style="color: var(--primary-color);">
                                <i class="fas fa-lightbulb me-2"></i>
                                Challenges I Overcame
                            </h6>
                            <ul class="feature-list">
                                <li>Understanding MVC architecture</li>
                                <li>Working with Eloquent relationships</li>
                                <li>Implementing dynamic color theming</li>
                                <li>Creating responsive layouts</li>
                                <li>Managing database migrations</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-5">
        <div class="text-center mb-4">
            <h2 class="section-title">My Learning Journey</h2>
            <p class="section-subtitle">Where I am and where I'm heading</p>
        </div>

        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="journey-card current">
                    <div class="journey-icon">
                        <i class="fas fa-graduation-cap fa-2x" style="color: var(--primary-color);"></i>
                    </div>
                    <h5>Currently Learning</h5>
                    <ul class="journey-list">
                        <li>Advanced Laravel features</li>
                        <li>API development</li>
                        <li>Database optimization</li>
                        <li>Testing with PHPUnit</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="journey-card">
                    <div class="journey-icon">
                        <i class="fas fa-target fa-2x" style="color: var(--accent-color);"></i>
                    </div>
                    <h5>Next Goals</h5>
                    <ul class="journey-list">
                        <li>Learn docker</li>
                        <li>Explore microservices</li>
                        <li>Study system design</li>
                        <li>Practice algorithms</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="journey-card">
                    <div class="journey-icon">
                        <i class="fas fa-rocket fa-2x" style="color: var(--secondary-color);"></i>
                    </div>
                    <h5>Dream Job</h5>
                    <ul class="journey-list">
                        <li>Backend Developer</li>
                        <li>Work with APIs</li>
                        <li>Build scalable systems</li>
                        <li>Join a tech team</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    @if($popularTags->count() > 0)
        <section class="mb-5">
            <div class="text-center mb-4">
                <h2 class="section-title">Demo Categories</h2>
                <p class="section-subtitle">Different content types I created for testing</p>
            </div>

            <div class="demo-grid">
                @foreach($popularTags as $tag)
                    <a href="{{ route('posts.filterByTag', $tag->slug) }}"
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
                Want to See My Code?
            </h2>
            <p class="mb-4" style="color: rgba(255,255,255,0.9); font-size: 1.1rem;">
                This project helped me learn so much about backend development.
                Feel free to explore the demo content or learn more about my journey!
            </p>
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="{{ route('posts.index') }}" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-code me-2"></i>
                    Explore Demo
                </a>
                <a href="{{ route('about') }}" class="btn btn-balanced btn-lg" style="background: white; color: var(--primary-color);">
                    <i class="fas fa-user me-2"></i>
                    About My Journey
                </a>
            </div>
        </div>
    </section>
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
            background: linear-gradient(135deg, var(--primary-color)05, var(--accent-color)05);
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
            background: linear-gradient(135deg, var(--primary-color)20, var(--accent-color)20);
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

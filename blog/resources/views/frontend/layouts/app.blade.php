<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name', 'Eymen\'s Blog'))</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" media="print"
          onload="this.onload=null;this.media='all';">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"
          media="print" onload="this.onload=null;this.media='all';">
    <noscript>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    </noscript>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
        rel="stylesheet" media="print" onload="this.onload=null;this.media='all';">
    <noscript>
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
            rel="stylesheet">
    </noscript>


    <style>
        :root {
            --primary-color: #3b82f6;
            --secondary-color: #1e40af;
            --accent-color: #06b6d4;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --text-muted: #9ca3af;
            --bg-primary: #ffffff;
            --bg-secondary: #f8fafc;
            --bg-tertiary: #f1f5f9;
            --border-color: #e5e7eb;
            --success-color: #10b981;
            --warning-color: #f59e0b;
        }

        .tag-theme-active {
            --primary-color: {{ $activeTagColor ?? '#3b82f6' }};
            --secondary-color: {{ $activeTagColorDark ?? '#1e40af' }};
            --accent-color: {{ $activeTagColorLight ?? '#06b6d4' }};
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            background-attachment: fixed;
            color: var(--text-primary);
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .navbar-balanced {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 1020;
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
            font-size: 1.25rem;
            color: var(--primary-color) !important;
            text-decoration: none;
        }

        .nav-link {
            color: var(--text-secondary) !important;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.5rem 0.75rem !important;
            border-radius: 8px;
            font-size: 0.9rem;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
            background-color: var(--bg-tertiary);
        }

        .navbar-toggler {
            border: none;
            padding: 0.25rem 0.5rem;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .hero-balanced {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem 0;
            margin-bottom: 1.5rem;
            position: relative;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1rem;
            opacity: 0.9;
            margin-bottom: 1.5rem;
            font-weight: 400;
        }

        .content-card {
            background: var(--bg-primary);
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .content-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        /* FIXED: Sidebar positioning - no sticky positioning */
        .sidebar-card {
            background: var(--bg-primary);
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--border-color);
            position: relative; /* Changed from sticky */
            z-index: 1; /* Lower z-index */
        }

        .btn-balanced {
            background: var(--primary-color);
            border: 1px solid var(--primary-color);
            color: white;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            font-size: 0.9rem;
        }

        .btn-balanced:hover {
            background: var(--secondary-color);
            border-color: var(--secondary-color);
            color: white;
            transform: translateY(-1px);
        }

        .btn-balanced-outline {
            background: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            font-size: 0.9rem;
        }

        .btn-balanced-outline:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-1px);
        }

        .tag-badge {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 16px;
            font-size: 0.8rem;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            margin: 0.2rem 0.2rem 0.2rem 0;
            transition: all 0.3s ease;
        }

        .tag-badge:hover {
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* FIXED: Filter table with better spacing */
        .filter-table {
            width: 100%;
            margin-bottom: 0;
            font-size: 0.85rem;
        }

        .filter-table th {
            background: var(--bg-tertiary);
            color: var(--text-primary);
            font-weight: 600;
            padding: 0.75rem 0.5rem;
            border: none;
            font-size: 0.8rem;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .filter-table td {
            padding: 0.6rem 0.5rem;
            border: none;
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
        }

        .filter-table tbody tr:hover {
            background: var(--bg-secondary);
        }

        .post-count-badge {
            background: var(--bg-tertiary);
            color: var(--text-primary);
            padding: 0.2rem 0.5rem;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .tag-color-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .stats-card {
            text-align: center;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary-color) 15, var(--accent-color) 15);
            border-radius: 8px;
            margin-bottom: 0.5rem;
        }

        .stats-number {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
            font-family: 'Playfair Display', serif;
        }

        /* Mobile optimizations */
        @media (max-width: 768px) {
            .hero-balanced {
                padding: 1.5rem 0;
                margin-bottom: 1rem;
            }

            .hero-title {
                font-size: 1.75rem;
            }

            .hero-subtitle {
                font-size: 0.95rem;
            }

            .content-card {
                padding: 0.75rem;
                margin-bottom: 1rem;
            }

            .sidebar-card {
                padding: 0.75rem;
                margin-bottom: 1rem;
            }

            .navbar-brand {
                font-size: 1.1rem;
            }

            .btn-balanced, .btn-balanced-outline {
                padding: 0.5rem 1rem;
                font-size: 0.85rem;
            }

            .tag-badge {
                font-size: 0.75rem;
                padding: 0.25rem 0.6rem;
            }

            .filter-table {
                font-size: 0.8rem;
            }

            .filter-table th,
            .filter-table td {
                padding: 0.5rem 0.25rem;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 1.5rem;
            }

            .content-card .row .col-md-4,
            .content-card .row .col-md-8 {
                margin-bottom: 0.5rem;
            }

            .d-flex.justify-content-between {
                flex-direction: column;
                gap: 0.5rem;
            }

            .d-flex.justify-content-between .btn {
                align-self: flex-start;
            }
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .post-image {
            border-radius: 8px;
            transition: transform 0.3s ease;
            object-fit: cover;
        }

        .post-image:hover {
            transform: scale(1.02);
        }
    </style>

    @stack('styles')
</head>
<body class="{{ $hasTagTheme ?? false ? 'tag-theme-active' : '' }}">

<header>
    <nav class="navbar navbar-expand-lg navbar-balanced" role="navigation" aria-label="Main navigation">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}" aria-label="Go to homepage">
                <i class="fas fa-feather-alt me-2" aria-hidden="true"></i>
                Eymen's Blog
            </a>

            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-label="Toggle navigation menu"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    title="Toggle menu">
                <span class="navbar-toggler-icon">
                    <i class="fas fa-bars" aria-hidden="true"></i>
                </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link {{ request()->routeIs('index') ? 'active' : '' }}"
                       href="{{ route('index') }}"
                       aria-current="{{ request()->routeIs('index') ? 'page' : 'false' }}">
                        <i class="fas fa-home me-1" aria-hidden="true"></i>
                        Home
                    </a>
                    <a class="nav-link {{ request()->routeIs('posts.*') ? 'active' : '' }}"
                       href="{{ route('posts.index') }}"
                       aria-current="{{ request()->routeIs('posts.*') ? 'page' : 'false' }}">
                        <i class="fas fa-blog me-1" aria-hidden="true"></i>
                        Blog
                    </a>
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                       href="{{ route('about') }}"
                       aria-current="{{ request()->routeIs('about') ? 'page' : 'false' }}">
                        <i class="fas fa-user me-1" aria-hidden="true"></i>
                        About
                    </a>
                    <a class="nav-link {{ request()->routeIs('tags.*') ? 'active' : '' }}"
                       href="{{ route('tags.index') }}"
                       aria-current="{{ request()->routeIs('tags.*') ? 'page' : 'false' }}">
                        <i class="fas fa-tags me-1" aria-hidden="true"></i>
                        Tags
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>

@if(isset($showTagBanner) && $showTagBanner && isset($tag))
    <div class="container mt-2" role="status" aria-live="polite">
        <div class="alert alert-info"
             style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); border: none; color: white; border-radius: 12px;">
            <div class="d-flex align-items-center justify-content-center flex-wrap">
                <span class="me-2">
                    <i class="fas fa-filter me-1" aria-hidden="true"></i>
                    Filtering by: <strong>{{ $tag->name }}</strong>
                </span>
                <a href="{{ route('posts.index') }}"
                   class="btn btn-sm btn-outline-light"
                   aria-label="Clear tag filter">
                    <i class="fas fa-times me-1" aria-hidden="true"></i>
                    Clear
                </a>
            </div>
        </div>
    </div>
@endif

@hasSection('hero')
    <section class="hero-balanced" role="region" aria-label="Hero section">
        <div class="container">
            <div class="hero-content text-center">
                @yield('hero')
            </div>
        </div>
    </section>
@endif

<main class="container my-3" role="main">
    @yield('content')
</main>

@include('frontend.layouts.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

</body>
</html>

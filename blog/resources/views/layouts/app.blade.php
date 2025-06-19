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
            --text-secondary: #000000;
            --text-third: #ffffff;
            --text-muted: #6b7280;
            --bg-primary: #ffffff;
            --bg-secondary: #f8fafc;
            --bg-tertiary: #f1f5f9;
            --border-color: #e5e7eb;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --gradient-primary: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            --gradient-secondary: linear-gradient(135deg, var(--accent-color), var(--primary-color));
            --gradient-accent: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            --bloom-shadow: 0 0 30px rgba(var(--primary-rgb), 0.4);
            --bloom-glow: 0 0 60px rgba(var(--primary-rgb), 0.2);
            --primary-rgb: 59, 130, 246;
            --secondary-rgb: 30, 64, 175;
            --accent-rgb: 6, 182, 212;
        }

        /* ENHANCED TAG THEME SYSTEM - This is the magic! */
        .tag-theme-active {
            --primary-color: {{ $activeTagColor ?? '#3b82f6' }};
            --secondary-color: {{ $activeTagColorDark ?? '#1e40af' }};
            --accent-color: {{ $activeTagColorLight ?? '#06b6d4' }};
            --gradient-primary: linear-gradient(135deg, {{ $activeTagColor ?? '#3b82f6' }}, {{ $activeTagColorDark ?? '#1e40af' }});
            --gradient-secondary: linear-gradient(135deg, {{ $activeTagColorLight ?? '#06b6d4' }}, {{ $activeTagColor ?? '#3b82f6' }});
            --gradient-accent: linear-gradient(135deg, {{ $activeTagColor ?? '#3b82f6' }}, {{ $activeTagColorLight ?? '#06b6d4' }});
            --bloom-shadow: 0 0 40px {{ $activeTagColor ?? '#3b82f6' }}66;
            --bloom-glow: 0 0 80px {{ $activeTagColor ?? '#3b82f6' }}33;
            --primary-rgb: {{ $activeTagColorRgb ?? '59, 130, 246' }};

            /* Animate the color transition */
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* BLOOMY EFFECTS - Much more vibrant! */
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 50%, #f1f5f9 100%);
            background-attachment: fixed;
            color: var(--text-primary);
            line-height: 1.6;
            margin: 0;
            padding: 0;
            transition: all 0.8s ease;
        }

        .tag-theme-active body {
            background: linear-gradient(135deg,
            rgba(var(--primary-rgb), 0.05) 0%,
            rgba(var(--secondary-rgb), 0.03) 50%,
            rgba(var(--accent-rgb), 0.05) 100%);
        }

        /* Enhanced Navbar with Bloom */
        .navbar-balanced {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(20px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1), var(--bloom-shadow);
            padding: 0.75rem 0;
            border-bottom: 2px solid transparent;
            border-image: var(--gradient-primary) 1;
            position: sticky;
            top: 0;
            z-index: 1020;
            transition: all 0.5s ease;
        }

        .navbar-balanced.scrolled {
            background: rgba(255, 255, 255, 0.98) !important;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15), var(--bloom-glow);
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.4rem;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
            transition: all 0.3s ease;
            filter: drop-shadow(0 0 10px rgba(var(--primary-rgb), 0.3));
        }

        .navbar-brand:hover {
            transform: scale(1.05);
            filter: drop-shadow(0 0 20px rgba(var(--primary-rgb), 0.5));
        }

        .nav-link {
            color: var(--text-secondary) !important;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.6rem 1rem !important;
            border-radius: 12px;
            font-size: 0.9rem;
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gradient-accent);
            transition: left 0.3s ease;
            z-index: -1;
            opacity: 0.1;
        }

        .nav-link:hover::before {
            left: 0;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
            transform: translateY(-2px);
        }

        .nav-link.active {
            background: var(--gradient-primary);
            color: white !important;
            box-shadow: var(--bloom-shadow);
            border-radius: 12px;
        }

        /* Auth Buttons */
        .auth-buttons {
            display: flex;
            gap: 0.5rem;
            align-items: center;
            margin-left: 1rem;
        }

        .btn-auth {
            padding: 0.5rem 1.2rem;
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            position: relative;
            overflow: hidden;
        }

        .btn-auth::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn-auth:hover::before {
            left: 100%;
        }

        .btn-login {
            background: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn-login:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--bloom-shadow);
            filter: brightness(1.1);
        }

        .btn-register {
            background: var(--primary-color);
            color: white;
            border: 2px solid var(--primary-color);
        }

        .btn-register:hover {
            background: var(--secondary-color);
            border-color: var(--secondary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(var(--primary-rgb), 0.3);
        }

        /* User Dropdown */
        .user-dropdown {
            position: relative;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .user-avatar:hover {
            transform: scale(1.1);
            border-color: var(--primary-color);
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            border-radius: 12px;
            padding: 0.5rem 0;
            margin-top: 0.5rem;
        }

        .dropdown-item {
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
            border-radius: 8px;
            margin: 0 0.5rem;
        }

        .dropdown-item:hover {
            background: var(--bg-tertiary);
            transform: translateX(5px);
        }

        .navbar-toggler {
            border: none;
            padding: 0.25rem 0.5rem;
            background: var(--gradient-primary);
            border-radius: 8px;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.25);
        }

        .navbar-toggler-icon {
            color: white;
        }

        /* Enhanced Hero with Dynamic Colors */
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

        /* Bloomy Cards */
        .content-card {
            background: var(--bg-primary);
            border-radius: 20px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 2px solid transparent;
            background-clip: padding-box;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .content-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-primary);
            transform: scaleX(0);
            transition: transform 0.5s ease;
        }

        .content-card:hover::before {
            transform: scaleX(1);
        }

        .content-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15), var(--bloom-shadow);
            border-color: var(--primary-color);
        }

        .sidebar-card {
            background: var(--bg-primary);
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--border-color);
            position: relative;
            z-index: 1;
            transition: all 0.3s ease;
        }

        .sidebar-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
        }

        /* Bloomy Buttons */
        .btn-balanced {
            background: var(--gradient-primary);
            border: none;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.4s ease;
            text-decoration: none;
            display: inline-block;
            font-size: 0.9rem;
            position: relative;
            overflow: hidden;
            box-shadow: var(--bloom-shadow);
        }

        .btn-balanced::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.6s;
        }

        .btn-balanced:hover::before {
            left: 100%;
        }

        .btn-balanced:hover {
            background: var(--gradient-secondary);
            color: white;
            transform: translateY(-3px);
            box-shadow: var(--bloom-glow);
            filter: brightness(1.2);
        }

        .btn-balanced-outline {
            background: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            font-size: 0.9rem;
        }

        .btn-balanced-outline:hover {
            background: var(--gradient-primary);
            border-color: transparent;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
        }

        /* Super Bloomy Tags */
        .tag-badge {
            background: var(--gradient-accent);
            color: white;
            padding: 0.5rem 1.2rem;
            border-radius: 25px;
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            margin: 0.3rem 0.3rem 0.3rem 0;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(var(--primary-rgb), 0.3);
        }

        .tag-badge::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: left 0.6s;
        }

        .tag-badge:hover::before {
            left: 100%;
        }

        .tag-badge:hover {
            color: white;
            transform: translateY(-4px) scale(1.08);
            box-shadow: var(--bloom-glow);
            filter: brightness(1.3) saturate(1.2);
        }

        /* Enhanced Filter Table */
        .filter-table {
            width: 100%;
            margin-bottom: 0;
            font-size: 0.85rem;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .filter-table th {
            background: var(--gradient-primary);
            color: white;
            font-weight: 600;
            padding: 1rem 0.75rem;
            border: none;
            font-size: 0.8rem;
            position: sticky;
            top: 0;
            z-index: 10;
            box-shadow: var(--bloom-shadow);
        }

        .filter-table td {
            padding: 0.75rem;
            border: none;
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
            transition: all 0.3s ease;
        }

        .filter-table tbody tr:hover {
            background: var(--bg-secondary);
            transform: scale(1.01);
        }

        .post-count-badge {
            background: var(--gradient-accent);
            color: white;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            box-shadow: 0 2px 10px rgba(var(--primary-rgb), 0.3);
        }

        .tag-color-dot {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            display: inline-block;
            border: 2px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        /* Bloomy Stats */
        .stats-card {
            text-align: center;
            padding: 2rem;
            background: var(--gradient-primary);
            border-radius: 20px;
            margin-bottom: 1rem;
            color: white;
            transition: all 0.4s ease;
            box-shadow: var(--bloom-shadow);
        }

        .stats-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: var(--bloom-glow);
            filter: brightness(1.1);
        }

        .stats-number {
            font-size: 2rem;
            font-weight: 700;
            color: white;
            font-family: 'Playfair Display', serif;
        }

        /* Enhanced Tag Banner */
        .alert-info {
            background: var(--gradient-primary) !important;
            border: none !important;
            color: white !important;
            border-radius: 20px !important;
            box-shadow: var(--bloom-shadow) !important;
            border: 2px solid rgba(255,255,255,0.2) !important;
        }

        /* Scroll to Top with Bloom */
        .scroll-to-top {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 55px;
            height: 55px;
            background: var(--gradient-primary);
            color: white;
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.4s ease;
            opacity: 0;
            visibility: hidden;
            z-index: 1000;
            box-shadow: var(--bloom-shadow);
        }

        .scroll-to-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .scroll-to-top:hover {
            transform: translateY(-6px) scale(1.1);
            box-shadow: var(--bloom-glow);
            filter: brightness(1.2);
        }

        /* Pulsing animation for active elements */
        @keyframes bloomPulse {
            0%, 100% {
                box-shadow: var(--bloom-shadow);
                filter: brightness(1);
            }
            50% {
                box-shadow: var(--bloom-glow);
                filter: brightness(1.1);
            }
        }

        .tag-theme-active .btn-balanced,
        .tag-theme-active .tag-badge,
        .tag-theme-active .stats-card {
            animation: bloomPulse 3s ease-in-out infinite;
        }

        /* Mobile optimizations */
        @media (max-width: 768px) {
            .hero-balanced {
                padding: 2rem 0;
                margin-bottom: 1.5rem;
            }

            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .content-card {
                padding: 1rem;
                margin-bottom: 1.5rem;
            }

            .sidebar-card {
                padding: 1rem;
                margin-bottom: 1.5rem;
            }

            .navbar-brand {
                font-size: 1.2rem;
            }

            .auth-buttons {
                flex-direction: column;
                width: 100%;
                margin-left: 0;
                margin-top: 1rem;
            }

            .btn-auth {
                width: 100%;
                justify-content: center;
            }

            .scroll-to-top {
                bottom: 1rem;
                right: 1rem;
                width: 45px;
                height: 45px;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 1.75rem;
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
            border-radius: 12px;
            transition: transform 0.3s ease;
            object-fit: cover;
        }

        .post-image:hover {
            transform: scale(1.05);
        }

        /* Loading animation */
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .loading {
            animation: pulse 2s infinite;
        }
    </style>

    @stack('styles')
</head>
<body class="{{ $hasTagTheme ?? false ? 'tag-theme-active' : '' }}">

<header>
    <nav class="navbar navbar-expand-lg navbar-balanced" role="navigation" aria-label="Main navigation" id="mainNavbar">
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
                <div class="navbar-nav me-auto">
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

                <!-- Auth Section -->
                <div class="auth-buttons">
                    @auth
                        <div class="dropdown user-dropdown">
                            <div class="user-avatar" data-bs-toggle="dropdown" aria-expanded="false" title="{{ Auth::user()->name }}">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                                        <i class="fas fa-tachometer-alt me-2"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        <i class="fas fa-user-circle me-2"></i>
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('settings') }}">
                                        <i class="fas fa-cog me-2"></i>
                                        Settings
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="fas fa-sign-out-alt me-2"></i>
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn-auth btn-login">
                            <i class="fas fa-sign-in-alt"></i>
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="btn-auth btn-register">
                            <i class="fas fa-user-plus"></i>
                            Register
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
</header>

@if(isset($showTagBanner) && $showTagBanner && isset($tag))
    <div class="container mt-2" role="status" aria-live="polite">
        <div class="alert alert-info"
             style="background: var(--gradient-primary); border: none; color: white; border-radius: 20px; box-shadow: var(--bloom-shadow) !important; border: 2px solid rgba(255,255,255,0.2) !important;">
            <div class="d-flex align-items-center justify-content-center flex-wrap">
                <span class="me-2">
                    <i class="fas fa-filter me-1" aria-hidden="true"></i>
                    Filtering by: <strong>{{ $tag->name }}</strong>
                </span>
                <a href="{{ route('posts.index') }}"
                   class="btn btn-sm btn-outline-light"
                   aria-label="Clear tag filter"
                   style="border-radius: 20px;">
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

@include('layouts.footer')

<!-- Scroll to Top Button -->
<button class="scroll-to-top" id="scrollToTop" title="Scroll to top">
    <i class="fas fa-chevron-up"></i>
</button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Enhanced navbar scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('mainNavbar');
        const scrollToTop = document.getElementById('scrollToTop');

        if (window.scrollY > 100) {
            navbar.classList.add('scrolled');
            scrollToTop.classList.add('visible');
        } else {
            navbar.classList.remove('scrolled');
            scrollToTop.classList.remove('visible');
        }
    });

    // Scroll to top functionality
    document.getElementById('scrollToTop').addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Enhanced dropdown hover effect
    document.querySelectorAll('.dropdown').forEach(dropdown => {
        dropdown.addEventListener('mouseenter', function() {
            this.querySelector('.dropdown-toggle').click();
        });
    });

    // Add loading animation to buttons
    document.querySelectorAll('.btn-balanced, .btn-auth').forEach(button => {
        button.addEventListener('click', function() {
            this.classList.add('loading');
            setTimeout(() => {
                this.classList.remove('loading');
            }, 2000);
        });
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
</script>

@stack('scripts')

</body>
</html>

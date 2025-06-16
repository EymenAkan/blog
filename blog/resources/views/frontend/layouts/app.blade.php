<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Eymen\'s Blog')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            /* Softer, more readable theme */
            --primary-color: #2d3748;
            --secondary-color: #4a5568;
            --accent-color: #718096;
            --text-primary: #2d3748;
            --text-secondary: #718096;
            --text-muted: #a0aec0;
            --bg-primary: #ffffff;
            --bg-secondary: #f7fafc;
            --bg-tertiary: #edf2f7;
            --border-color: #e2e8f0;
            --border-light: #f1f5f9;
        }

        /* Tag-specific theming - applied when viewing tagged content */
        .tag-theme-active {
            --primary-color: {{ $activeTagColor ?? '#2d3748' }};
            --secondary-color: {{ $activeTagColorDark ?? '#4a5568' }};
            --accent-color: {{ $activeTagColorLight ?? '#718096' }};
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-secondary);
            color: var(--text-primary);
            line-height: 1.6;
        }

        .navbar-clean {
            background: var(--bg-primary) !important;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            border-bottom: 1px solid var(--border-color);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-color) !important;
            text-decoration: none;
        }

        .nav-link {
            color: var(--text-secondary) !important;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem !important;
            border-radius: 6px;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
            background-color: var(--bg-secondary);
        }

        .hero-clean {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 3rem 0;
            margin-bottom: 2rem;
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .hero-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 2rem;
            font-weight: 400;
        }

        .content-card {
            background: var(--bg-primary);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .content-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .sidebar-card {
            background: var(--bg-primary);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid var(--border-color);
            position: sticky;
            top: 2rem;
        }

        .btn-clean {
            background: var(--primary-color);
            border: 1px solid var(--primary-color);
            color: white;
            padding: 0.6rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .btn-clean:hover {
            background: var(--secondary-color);
            border-color: var(--secondary-color);
            color: white;
            transform: translateY(-1px);
        }

        .btn-clean-outline {
            background: transparent;
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
            padding: 0.6rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .btn-clean-outline:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-1px);
        }

        .tag-badge-clean {
            background: var(--bg-tertiary);
            color: var(--text-primary);
            padding: 0.3rem 0.8rem;
            border-radius: 16px;
            font-size: 0.85rem;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            margin: 0.2rem 0.2rem 0.2rem 0;
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
        }

        .tag-badge-clean:hover {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
            transform: translateY(-1px);
        }

        .active-tag-banner {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1rem 0;
            margin-bottom: 2rem;
            text-align: center;
            border-radius: 8px;
        }

        .filter-table {
            width: 100%;
            margin-bottom: 0;
        }

        .filter-table th {
            background: var(--bg-tertiary);
            color: var(--text-primary);
            font-weight: 600;
            font-size: 0.9rem;
            padding: 0.75rem;
            border: 1px solid var(--border-color);
        }

        .filter-table td {
            padding: 0.6rem 0.75rem;
            border: 1px solid var(--border-light);
            vertical-align: middle;
        }

        .filter-table tbody tr:hover {
            background: var(--bg-secondary);
        }

        .tag-color-dot {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            display: inline-block;
            border: 2px solid white;
            box-shadow: 0 0 0 1px var(--border-color);
        }

        .post-count-badge {
            background: var(--bg-tertiary);
            color: var(--text-secondary);
            padding: 0.2rem 0.5rem;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .footer-clean {
            background: var(--primary-color);
            color: white;
            padding: 2rem 0;
            margin-top: 3rem;
        }

        /* Post content specific styles */
        .post-content {
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .post-image {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .breadcrumb-clean {
            background: transparent;
            padding: 0;
            margin-bottom: 1rem;
        }

        .breadcrumb-clean .breadcrumb-item a {
            color: var(--text-secondary);
            text-decoration: none;
        }

        .breadcrumb-clean .breadcrumb-item a:hover {
            color: var(--primary-color);
        }

        .breadcrumb-clean .breadcrumb-item.active {
            color: var(--text-primary);
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }
            .sidebar-card {
                position: static;
                margin-top: 2rem;
            }
        }
    </style>

    @stack('styles')
</head>
<body class="{{ $hasTagTheme ?? false ? 'tag-theme-active' : '' }}">

<header>
    <nav class="navbar navbar-expand-lg navbar-clean">
        <div class="container">
            <a class="navbar-brand" href="{{ route('posts.index') }}">
                <i class="fas fa-blog me-2"></i>
                Eymen's Blog
            </a>

            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('posts.index') }}">
                    <i class="fas fa-home me-1"></i>
                    Posts
                </a>
                <a class="nav-link" href="{{ route('tags.index') }}">
                    <i class="fas fa-tags me-1"></i>
                    Manage Tags
                </a>
            </div>
        </div>
    </nav>
</header>

@if(isset($showTagBanner) && $showTagBanner && isset($tag))
    <div class="container mt-3">
        <div class="active-tag-banner">
            <div class="d-flex align-items-center justify-content-center">
                <i class="fas fa-filter me-2"></i>
                <span>Showing posts tagged with: <strong>{{ $tag->name }}</strong></span>
                <a href="{{ route('posts.index') }}" class="btn btn-sm btn-outline-light ms-3">
                    <i class="fas fa-times me-1"></i>
                    Show All Posts
                </a>
            </div>
        </div>
    </div>
@endif

@hasSection('hero')
    <section class="hero-clean">
        <div class="container">
            @yield('hero')
        </div>
    </section>
@endif

<main class="container my-4">
    @yield('content')
</main>

<footer class="footer-clean">
    <div class="container text-center">
        <p class="mb-0">&copy; 2025 Eymen's Blog. Sharing thoughts and experiences.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>

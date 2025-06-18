<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Your Blog</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #7c3aed;
            --accent-color: #f59e0b;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --dark-color: #1f2937;
            --light-color: #f8fafc;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --text-muted: #9ca3af;
            --border-color: #e5e7eb;
            --bg-primary: #ffffff;
            --bg-secondary: #f8fafc;
            --bg-tertiary: #f1f5f9;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--text-primary);
            background: var(--bg-secondary);
            min-height: 100vh;
        }

        .auth-container {
            display: flex;
            min-height: 100vh;
        }

        .auth-card {
            flex: 1;
            max-width: 600px;
            padding: 2rem;
            display: flex;
            flex-direction: column;
        }

        .auth-image {
            flex: 1;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .auth-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }

        .auth-quote {
            max-width: 400px;
            padding: 2rem;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .quote-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            line-height: 1.4;
            margin-bottom: 1rem;
        }

        .quote-author {
            font-style: italic;
            opacity: 0.8;
        }

        .auth-header {
            margin-bottom: 2rem;
        }

        .auth-brand {
            margin-bottom: 2rem;
        }

        .brand-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .auth-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .auth-subtitle {
            color: var(--text-secondary);
            font-size: 1.1rem;
        }

        .auth-body {
            flex: 1;
        }

        .auth-form {
            margin-bottom: 2rem;
        }

        .form-label {
            font-weight: 500;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .input-group-text {
            background-color: var(--bg-tertiary);
            border-color: var(--border-color);
            color: var(--text-secondary);
        }

        .form-control {
            border-color: var(--border-color);
            padding: 0.75rem 1rem;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.1);
        }

        .btn-balanced {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-balanced:hover {
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .forgot-link {
            color: var(--primary-color);
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .forgot-link:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }

        .auth-footer {
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border-color);
        }

        .auth-link {
            color: var(--primary-color);
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .auth-link:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }

        .auth-social {
            margin-top: 2rem;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid var(--border-color);
        }

        .divider span {
            padding: 0 1rem;
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        .social-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .social-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            background-color: var(--bg-tertiary);
            transform: translateY(-2px);
        }

        .password-strength {
            margin-top: 0.5rem;
        }

        .strength-meter {
            height: 6px;
            background-color: var(--bg-tertiary);
            border-radius: 3px;
            margin-bottom: 0.5rem;
            overflow: hidden;
        }

        .strength-meter-fill {
            height: 100%;
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        .strength-meter-fill[data-strength="0"] {
            width: 10%;
            background-color: var(--danger-color);
        }

        .strength-meter-fill[data-strength="1"] {
            width: 25%;
            background-color: var(--danger-color);
        }

        .strength-meter-fill[data-strength="2"] {
            width: 50%;
            background-color: var(--warning-color);
        }

        .strength-meter-fill[data-strength="3"] {
            width: 75%;
            background-color: var(--accent-color);
        }

        .strength-meter-fill[data-strength="4"] {
            width: 90%;
            background-color: var(--success-color);
        }

        .strength-meter-fill[data-strength="5"] {
            width: 100%;
            background-color: var(--success-color);
        }

        .strength-text {
            font-size: 0.85rem;
            color: var(--text-secondary);
        }

        .password-tips {
            background-color: var(--bg-tertiary);
            padding: 1rem;
            border-radius: 8px;
            margin-top: 1rem;
        }

        .password-tips h6 {
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .password-tips ul {
            padding-left: 1.5rem;
            margin-bottom: 0;
            color: var(--text-secondary);
        }

        .auth-help {
            margin-top: 2rem;
        }

        .help-card {
            background-color: var(--bg-tertiary);
            border-radius: 8px;
            padding: 1.5rem;
            display: flex;
            align-items: flex-start;
            gap: 1rem;
        }

        .help-icon {
            font-size: 1.5rem;
            color: var(--primary-color);
        }

        .help-content h5 {
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .help-content p {
            color: var(--text-secondary);
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .verification-status {
            text-align: center;
            margin-bottom: 2rem;
        }

        .verification-icon {
            font-size: 4rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
        }

        .verification-message {
            color: var(--text-secondary);
        }

        @media (max-width: 992px) {
            .auth-image {
                display: none;
            }

            .auth-card {
                max-width: 100%;
            }
        }

        @media (max-width: 576px) {
            .auth-card {
                padding: 1.5rem;
            }

            .auth-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
<main>
    @yield('content')
</main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')
</body>
</html>

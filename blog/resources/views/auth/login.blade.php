@extends('layouts.auth')

@section('title', __('auth.login_title'))

@section('content')
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <div class="auth-brand">
                    <a href="{{ route('index') }}" class="d-flex align-items-center text-decoration-none">
                        <i class="fas fa-book-open me-2" style="color: var(--primary-color);"></i>
                        <span class="brand-text">Your Blog</span>
                    </a>
                </div>
                <h1 class="auth-title">{{ __('auth.welcome_back') }}</h1>
                <p class="auth-subtitle">{{ __('auth.sign_in_continue') }}</p>
            </div>

            <div class="auth-body">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="auth-form">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">{{ __('auth.email_address') }}</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ old('email') }}"
                                   placeholder="{{ __('auth.email_placeholder') }}" required autofocus>
                        </div>
                        @error('email')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   id="password" name="password" placeholder="{{ __('auth.password_placeholder') }}" required>
                            <button type="button" class="btn btn-outline-secondary toggle-password" tabindex="-1"
                                    title="{{ __('auth.toggle_password') }}">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        @error('password')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('auth.remember_me') }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-balanced btn-lg w-100">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            {{ __('auth.sign_in') }}
                        </button>
                    </div>
                </form>
            </div>

            <div class="auth-footer">
                <p class="text-center mb-2">
                    {{ __('auth.forgot_password') }}
                    <a href="{{ route('password.request') }}" class="auth-link">{{ __('auth.reset_password_link') }}</a>
                </p>
                <p class="text-center mb-0">
                    {{ __('auth.dont_have_account') }}
                    <a href="{{ route('register') }}" class="auth-link">{{ __('auth.create_account_link') }}</a>
                </p>
            </div>

            <div class="auth-social">
                <div class="divider">
                    <span>{{ __('auth.or_sign_in_with') }}</span>
                </div>
                <div class="social-buttons">
                    <a href="{{ route('socialite.redirect', 'github') }}"
                       class="social-btn github-btn"
                       data-provider="github"
                       onclick="handleSocialLogin(this, 'github')">
                        <i class="fab fa-github"></i>
                        <span>{{ __('auth.continue_with_github') }}</span>
                    </a>

                    <a href="{{ route('socialite.redirect', 'google') }}"
                       class="social-btn google-btn"
                       data-provider="google"
                       onclick="handleSocialLogin(this, 'google')">
                        <i class="fab fa-google"></i>
                        <span>{{ __('auth.continue_with_google') }}</span>
                    </a>
                </div>

                <div class="social-benefits">
                    <div class="benefit-item">
                        <i class="fas fa-shield-alt"></i>
                        <span>{{ __('auth.secure_oauth') }}</span>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-clock"></i>
                        <span>{{ __('auth.quick_login') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="auth-image">
            <div class="auth-quote">
                <i class="fas fa-quote-left fa-2x mb-3" style="opacity: 0.5;"></i>
                <p class="quote-text">{{ __('auth.login_quote') }}</p>
                <p class="quote-author">{{ __('auth.login_quote_author') }}</p>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Toggle password visibility
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function () {
                const input = this.previousElementSibling;
                const icon = this.querySelector('i');

                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });

        // Handle social login
        function handleSocialLogin(button, provider) {
            button.classList.add('loading');
            const originalContent = button.innerHTML;
            const span = button.querySelector('span');
            span.textContent = `Connecting to ${provider.charAt(0).toUpperCase() + provider.slice(1)}...`;

            if (typeof gtag !== 'undefined') {
                gtag('event', 'social_login_attempt', {
                    'provider': provider,
                    'page': 'login'
                });
            }

            setTimeout(() => {
                if (button.classList.contains('loading')) {
                    button.classList.remove('loading');
                    button.innerHTML = originalContent;
                }
            }, 10000);
        }

        // Handle OAuth callback messages
        window.addEventListener('message', function (event) {
            if (event.data.type === 'oauth_success') {
                const buttons = document.querySelectorAll('.social-btn');
                buttons.forEach(btn => {
                    btn.classList.remove('loading');
                    btn.classList.add('success');
                });
                setTimeout(() => {
                    window.location.href = event.data.redirect || '/dashboard';
                }, 1000);
            } else if (event.data.type === 'oauth_error') {
                const buttons = document.querySelectorAll('.social-btn');
                buttons.forEach(btn => {
                    btn.classList.remove('loading');
                    btn.classList.add('error');
                });
                setTimeout(() => {
                    buttons.forEach(btn => btn.classList.remove('error'));
                }, 3000);
            }
        });
    </script>
@endpush

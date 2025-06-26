@extends('layouts.auth')

@section('title', __('auth.register_title'))

@section('content')
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <div class="auth-brand">
                    <a href="{{ route('index') }}" class="d-flex align-items-center text-decoration-none">
                        <i class="fas fa-book-open me-2" style="color: var(--primary-color);"></i>
                        <span class="brand-text">{{ config('app.name', 'Your Blog') }}</span>
                    </a>
                </div>
                <h1 class="auth-title">{{ __('auth.join_community') }}</h1>
                <p class="auth-subtitle">{{ __('auth.create_account_to_start') }}</p>
            </div>

            <div class="auth-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="auth-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">{{ __('auth.full_name') }}</label>
                                <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="name" name="name" value="{{ old('name') }}"
                                           placeholder="{{ __('auth.name_placeholder') }}" required autofocus>
                                </div>
                                @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="username" class="form-label">{{ __('auth.username') }}</label>
                                <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-at"></i>
                                </span>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                           id="username" name="username" value="{{ old('username') }}"
                                           placeholder="{{ __('auth.username_placeholder') }}" required>
                                </div>
                                @error('username')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" class="form-label">{{ __('auth.email_address') }}</label>
                        <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </span>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ old('email') }}"
                                   placeholder="{{ __('auth.email_placeholder') }}" required>
                        </div>
                        @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="password" class="form-label">{{ __('auth.password') }}</label>
                                <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           id="password" name="password" placeholder="••••••••" required>
                                    <button type="button" class="btn btn-outline-secondary toggle-password" tabindex="-1" aria-label="{{ __('auth.toggle_password') }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="password_confirmation" class="form-label">{{ __('auth.confirm_password') }}</label>
                                <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                                    <input type="password" class="form-control"
                                           id="password_confirmation" name="password_confirmation"
                                           placeholder="••••••••" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <div class="password-strength">
                            <div class="strength-meter">
                                <div class="strength-meter-fill" data-strength="0"></div>
                            </div>
                            <div class="strength-text">{{ __('auth.password_strength') }}: <span>{{ __('auth.too_weak') }}</span></div>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
                            <label class="form-check-label" for="terms">
                                {!! __('auth.agree_terms', ['terms' => '<a href="#" class="auth-link">Terms of Service</a>', 'privacy' => '<a href="#" class="auth-link">Privacy Policy</a>']) !!}
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-balanced btn-lg w-100">
                            <i class="fas fa-user-plus me-2"></i>
                            {{ __('auth.create_account') }}
                        </button>
                    </div>
                </form>
            </div>

            <div class="auth-footer">
                <p class="text-center mb-0">
                    {{ __('auth.already_have_account') }}
                    <a href="{{ route('login') }}" class="auth-link">{{ __('auth.sign_in') }}</a>
                </p>
            </div>

            <div class="auth-social">
                <div class="divider">
                    <span>{{ __('auth.or_sign_up_with') }}</span>
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
                        <i class="fas fa-user-plus"></i>
                        <span>{{ __('auth.auto_fill_profile') }}</span>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-envelope-check"></i>
                        <span>{{ __('auth.pre_verified_email') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="auth-image">
            <div class="auth-quote">
                <i class="fas fa-quote-left fa-2x mb-3" style="opacity: 0.5;"></i>
                <p class="quote-text">{{ __('auth.register_quote') }}</p>
                <p class="quote-author">{{ __('auth.register_quote_author') }}</p>
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

        // Password strength meter
        const passwordInput = document.getElementById('password');
        const strengthMeter = document.querySelector('.strength-meter-fill');
        const strengthText = document.querySelector('.strength-text span');

        passwordInput.addEventListener('input', function () {
            const password = this.value;
            let strength = 0;

            // Length check
            if (password.length >= 8) strength += 1;

            // Contains lowercase
            if (/[a-z]/.test(password)) strength += 1;

            // Contains uppercase
            if (/[A-Z]/.test(password)) strength += 1;

            // Contains number
            if (/[0-9]/.test(password)) strength += 1;

            // Contains special character
            if (/[^A-Za-z0-9]/.test(password)) strength += 1;

            // Update strength meter
            strengthMeter.setAttribute('data-strength', strength);

            // Update text
            const strengthLabels = ['Too weak', 'Weak', 'Fair', 'Good', 'Strong', 'Very strong'];
            strengthText.textContent = strengthLabels[strength];
        });

        // Handle social login
        function handleSocialLogin(button, provider) {
            // Add loading state
            button.classList.add('loading');

            // Store the original content
            const originalContent = button.innerHTML;

            // Update button text
            const span = button.querySelector('span');
            span.textContent = `Connecting to ${provider.charAt(0).toUpperCase() + provider.slice(1)}...`;

            // Optional: Add analytics tracking
            if (typeof gtag !== 'undefined') {
                gtag('event', 'social_signup_attempt', {
                    'provider': provider,
                    'page': 'register'
                });
            }

            // Handle errors (you can customize this)
            setTimeout(() => {
                // This would normally be handled by your OAuth flow
                // Remove loading state if there's an error
                if (button.classList.contains('loading')) {
                    button.classList.remove('loading');
                    button.innerHTML = originalContent;
                }
            }, 10000); // 10 second timeout
        }

        // Handle OAuth callback messages
        window.addEventListener('message', function (event) {
            if (event.data.type === 'oauth_success') {
                // Handle successful OAuth
                const buttons = document.querySelectorAll('.social-btn');
                buttons.forEach(btn => {
                    btn.classList.remove('loading');
                    btn.classList.add('success');
                });

                // Redirect or refresh
                setTimeout(() => {
                    window.location.href = event.data.redirect || '/dashboard';
                }, 1000);
            } else if (event.data.type === 'oauth_error') {
                // Handle OAuth error
                const buttons = document.querySelectorAll('.social-btn');
                buttons.forEach(btn => {
                    btn.classList.remove('loading');
                    btn.classList.add('error');
                });

                // Show error message
                setTimeout(() => {
                    buttons.forEach(btn => btn.classList.remove('error'));
                }, 3000);
            }
        });
    </script>
@endpush

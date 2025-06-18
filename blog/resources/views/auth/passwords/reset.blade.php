@extends('frontend.layouts.auth')

@section('title', 'Set New Password')

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
                <h1 class="auth-title">Set New Password</h1>
                <p class="auth-subtitle">Create a strong password for your account</p>
            </div>

            <div class="auth-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.update') }}" class="auth-form">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </span>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ $email ?? old('email') }}"
                                   placeholder="your.email@example.com" required readonly>
                        </div>
                        @error('email')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="password" class="form-label">New Password</label>
                        <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   id="password" name="password" placeholder="••••••••" required autofocus>
                            <button type="button" class="btn btn-outline-secondary toggle-password" tabindex="-1">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        @error('password')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="password_confirmation" class="form-label">Confirm New Password</label>
                        <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                            <input type="password" class="form-control"
                                   id="password_confirmation" name="password_confirmation"
                                   placeholder="••••••••" required>
                            <button type="button" class="btn btn-outline-secondary toggle-password" tabindex="-1">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <div class="password-strength">
                            <div class="strength-meter">
                                <div class="strength-meter-fill" data-strength="0"></div>
                            </div>
                            <div class="strength-text">Password strength: <span>Too weak</span></div>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <div class="password-tips">
                            <h6><i class="fas fa-shield-alt me-2"></i>Password Requirements:</h6>
                            <div class="requirements-list">
                                <div class="requirement" data-requirement="length">
                                    <i class="fas fa-times text-danger"></i>
                                    <span>At least 8 characters</span>
                                </div>
                                <div class="requirement" data-requirement="lowercase">
                                    <i class="fas fa-times text-danger"></i>
                                    <span>One lowercase letter</span>
                                </div>
                                <div class="requirement" data-requirement="uppercase">
                                    <i class="fas fa-times text-danger"></i>
                                    <span>One uppercase letter</span>
                                </div>
                                <div class="requirement" data-requirement="number">
                                    <i class="fas fa-times text-danger"></i>
                                    <span>One number</span>
                                </div>
                                <div class="requirement" data-requirement="special">
                                    <i class="fas fa-times text-danger"></i>
                                    <span>One special character</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-balanced btn-lg w-100">
                            <i class="fas fa-key me-2"></i>
                            Reset Password
                        </button>
                    </div>
                </form>
            </div>

            <div class="auth-footer">
                <p class="text-center mb-0">
                    <a href="{{ route('login') }}" class="auth-link">
                        <i class="fas fa-arrow-left me-1"></i>
                        Back to Login
                    </a>
                </p>
            </div>
        </div>

        <div class="auth-image">
            <div class="auth-quote">
                <i class="fas fa-quote-left fa-2x mb-3" style="opacity: 0.5;"></i>
                <p class="quote-text">Security is not a product, but a process.</p>
                <p class="quote-author">— Bruce Schneier</p>
            </div>
        </div>
    </div>

    <style>
        .requirements-list {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            margin-top: 0.75rem;
        }

        .requirement {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .requirement i {
            width: 16px;
            font-size: 0.8rem;
        }

        .requirement.valid i {
            color: var(--success-color) !important;
        }

        .requirement.valid i:before {
            content: "\f00c"; /* fa-check */
        }

        .requirement span {
            color: var(--text-secondary);
        }

        .requirement.valid span {
            color: var(--success-color);
        }
    </style>
@endsection

@push('scripts')
    <script>
        // Toggle password visibility
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function() {
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

        // Password strength meter and requirements checker
        const passwordInput = document.getElementById('password');
        const strengthMeter = document.querySelector('.strength-meter-fill');
        const strengthText = document.querySelector('.strength-text span');
        const requirements = document.querySelectorAll('.requirement');

        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;

            // Check requirements
            const checks = {
                length: password.length >= 8,
                lowercase: /[a-z]/.test(password),
                uppercase: /[A-Z]/.test(password),
                number: /[0-9]/.test(password),
                special: /[^A-Za-z0-9]/.test(password)
            };

            // Update requirement indicators
            requirements.forEach(req => {
                const requirement = req.getAttribute('data-requirement');
                if (checks[requirement]) {
                    req.classList.add('valid');
                    strength += 1;
                } else {
                    req.classList.remove('valid');
                }
            });

            // Update strength meter
            strengthMeter.setAttribute('data-strength', strength);

            // Update text
            const strengthLabels = ['Too weak', 'Weak', 'Fair', 'Good', 'Strong', 'Very strong'];
            strengthText.textContent = strengthLabels[strength];
        });

        // Form submission with loading state
        document.querySelector('form').addEventListener('submit', function(e) {
            const button = this.querySelector('button[type="submit"]');
            const originalText = button.innerHTML;

            // Show loading state
            button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Resetting Password...';
            button.disabled = true;

            // Re-enable after 5 seconds (in case of slow response)
            setTimeout(() => {
                if (button.disabled) {
                    button.innerHTML = originalText;
                    button.disabled = false;
                }
            }, 5000);
        });
    </script>
@endpush

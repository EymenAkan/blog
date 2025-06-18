@extends('frontend.layouts.auth')

@section('title', 'Reset Password')

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
                <h1 class="auth-title">Reset Password</h1>
                <p class="auth-subtitle">Enter your email to receive a password reset link</p>
            </div>

            <div class="auth-body">
                @if(session('status'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('status') }}
                    </div>
                @endif

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

                <div class="reset-info mb-4">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <div class="info-content">
                            <h6>How it works:</h6>
                            <ol class="small mb-0">
                                <li>Enter your email address below</li>
                                <li>Check your inbox for a reset link</li>
                                <li>Click the link to create a new password</li>
                                <li>Sign in with your new password</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('password.email') }}" class="auth-form">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </span>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ old('email') }}"
                                   placeholder="your.email@example.com" required autofocus>
                        </div>
                        @error('email')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="form-text">
                            <i class="fas fa-shield-alt me-1"></i>
                            We'll send a secure reset link to this email address
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <button type="submit" class="btn btn-balanced btn-lg w-100">
                            <i class="fas fa-paper-plane me-2"></i>
                            Send Reset Link
                        </button>
                    </div>
                </form>
            </div>

            <div class="auth-footer">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('login') }}" class="auth-link">
                        <i class="fas fa-arrow-left me-1"></i>
                        Back to Login
                    </a>
                    <a href="{{ route('register') }}" class="auth-link">
                        Create Account
                        <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <div class="auth-help">
                <div class="help-card">
                    <div class="help-icon">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <div class="help-content">
                        <h5>Need Help?</h5>
                        <p>If you're having trouble accessing your account or don't receive the reset email, please contact our support team.</p>
                        <div class="help-actions">
                            <a href="#" class="btn btn-sm btn-outline-secondary me-2">
                                <i class="fas fa-headset me-1"></i>
                                Contact Support
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-question me-1"></i>
                                FAQ
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="auth-image">
            <div class="auth-quote">
                <i class="fas fa-quote-left fa-2x mb-3" style="opacity: 0.5;"></i>
                <p class="quote-text">The key to success is to focus on goals, not obstacles.</p>
                <p class="quote-author">— Unknown</p>
            </div>
        </div>
    </div>

    <style>
        .reset-info {
            margin-bottom: 2rem;
        }

        .info-card {
            background: linear-gradient(135deg, var(--primary-color)10, var(--accent-color)10);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 1.5rem;
            display: flex;
            gap: 1rem;
        }

        .info-icon {
            font-size: 1.5rem;
            color: var(--primary-color);
            margin-top: 0.25rem;
        }

        .info-content h6 {
            color: var(--text-primary);
            margin-bottom: 0.75rem;
            font-weight: 600;
        }

        .info-content ol {
            color: var(--text-secondary);
            padding-left: 1.25rem;
        }

        .info-content ol li {
            margin-bottom: 0.25rem;
        }

        .help-actions {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        @media (max-width: 576px) {
            .auth-footer .d-flex {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .help-actions {
                flex-direction: column;
            }

            .help-actions .btn {
                width: 100%;
            }
        }
    </style>
@endsection

@push('scripts')
    <script>
        // Add some interactive feedback
        document.querySelector('form').addEventListener('submit', function(e) {
            const button = this.querySelector('button[type="submit"]');
            const originalText = button.innerHTML;

            // Show loading state
            button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Sending...';
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

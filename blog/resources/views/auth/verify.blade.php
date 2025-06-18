@extends('frontend.layouts.auth')

@section('title', 'Verify Your Email')

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
                <h1 class="auth-title">Verify Your Email</h1>
                <p class="auth-subtitle">Check your inbox for a verification link</p>
            </div>

            <div class="auth-body">
                @if(session('resent'))
                    <div class="alert alert-success" role="alert">
                        A fresh verification link has been sent to your email address.
                    </div>
                @endif

                <div class="verification-status">
                    <div class="verification-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="verification-message">
                        <p>Before proceeding, please check your email for a verification link.</p>
                        <p>If you did not receive the email, click the button below to request another.</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('verification.resend') }}" class="auth-form">
                    @csrf
                    <div class="form-group">
                        <button type="submit" class="btn btn-balanced btn-lg w-100">
                            <i class="fas fa-paper-plane me-2"></i>
                            Resend Verification Email
                        </button>
                    </div>
                </form>
            </div>

            <div class="auth-footer">
                <p class="text-center mb-0">
                    <a href="{{ route('logout') }}" class="auth-link"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt me-1"></i>
                        Logout
                    </a>
                </p>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>

            <div class="auth-help">
                <div class="help-card">
                    <div class="help-icon">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <div class="help-content">
                        <h5>Need Help?</h5>
                        <p>If you're having trouble verifying your email, please contact our support team.</p>
                        <a href="#" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-headset me-1"></i>
                            Contact Support
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="auth-image">
            <div class="auth-quote">
                <i class="fas fa-quote-left fa-2x mb-3" style="opacity: 0.5;"></i>
                <p class="quote-text">The journey of a thousand miles begins with a single step.</p>
                <p class="quote-author">— Lao Tzu</p>
            </div>
        </div>
    </div>
@endsection

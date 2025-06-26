@extends('frontend.layouts.auth')

@section('title', __('auth.verify_email_title'))

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
                <h1 class="auth-title">{{ __('auth.verify_email_heading') }}</h1>
                <p class="auth-subtitle">{{ __('auth.verify_email_instruction') }}</p>
            </div>

            <div class="auth-body">
                @if(session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('auth.verification_sent') }}
                    </div>
                @endif

                <div class="verification-status">
                    <div class="verification-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="verification-message">
                        <p>{{ __('auth.verification_check') }}</p>
                        <p>{{ __('auth.verification_not_received') }}</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('verification.resend') }}" class="auth-form">
                    @csrf
                    <div class="form-group">
                        <button type="submit" class="btn btn-balanced btn-lg w-100">
                            <i class="fas fa-paper-plane me-2"></i>
                            {{ __('auth.resend_verification') }}
                        </button>
                    </div>
                </form>
            </div>

            <div class="auth-footer">
                <p class="text-center mb-0">
                    <a href="{{ route('logout') }}" class="auth-link"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt me-1"></i>
                        {{ __('auth.logout') }}
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
                        <h5>{{ __('auth.need_help') }}</h5>
                        <p>{{ __('auth.verify_help_text') }}</p>
                        <a href="#" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-headset me-1"></i>
                            {{ __('auth.contact_support') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="auth-image">
            <div class="auth-quote">
                <i class="fas fa-quote-left fa-2x mb-3" style="opacity: 0.5;"></i>
                <p class="quote-text">{{ __('auth.verify_quote') }}</p>
                <p class="quote-author">{{ __('auth.verify_quote_author') }}</p>
            </div>
        </div>
    </div>
@endsection

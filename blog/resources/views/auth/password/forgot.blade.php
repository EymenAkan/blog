@extends('layouts.auth')

@section('title', 'Forgot Your Password')

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
                <h1 class="auth-title">Forgot Password</h1>
                <p class="auth-subtitle">Enter your email to reset your password</p>
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

                <form method="POST" action="{{ route('password.email') }}" class="auth-form">
                    @csrf
                    <div class="form-group mb-3">
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
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-balanced btn-lg w-100">
                            <i class="fas fa-paper-plane me-2"></i>
                            Send Reset Link
                        </button>
                    </div>
                </form>
            </div>

            <div class="auth-footer">
                <p class="text-center mb-0">
                    Remembered your password?
                    <a href="{{ route('login') }}" class="auth-link">Sign In</a>
                </p>
                <p class="text-center mb-0">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="auth-link">Create Account</a>
                </p>
            </div>
        </div>

        <div class="auth-image">
            <div class="auth-quote">
                <i class="fas fa-quote-left fa-2x mb-3" style="opacity: 0.5;"></i>
                <p class="quote-text">The only way to do great work is to love what you do.</p>
                <p class="quote-author">— Steve Jobs</p>
            </div>
        </div>
    </div>
@endsection

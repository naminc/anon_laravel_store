@extends('layouts.app')
@section('title', 'Login')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom/login.css?v=' . time()) }}">
@endpush
@section('content')
    <main>
        <div class="auth-container">
            <div class="auth-card">
                <h2 class="auth-title">Login to Your Account</h2>
                <div class="social-login">
                    <a href="#" class="social-btn">
                        <ion-icon name="logo-google"></ion-icon>
                    </a>
                    <a href="#" class="social-btn">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                    <a href="#" class="social-btn">
                        <ion-icon name="logo-apple"></ion-icon>
                    </a>
                </div>
                <div class="auth-divider">
                    <span class="auth-divider-text">or login with email</span>
                </div>

                <form class="auth-form" id="login-form" action="{{ route('auth.login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <input 
                            type="email" 
                            name="email"  
                            placeholder="Enter your email" 
                            class="form-input @error('email') is-invalid @enderror" 
                            value="{{ old('email') }}" 
                            required
                        />
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif  
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input
                            type="password"
                            name="password"
                            placeholder="Enter your password"
                            class="form-input @error('password') is-invalid @enderror"
                            value="{{ old('password') }}"
                            required
                        />
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="remember-forgot">
                        <div class="checkbox-group">
                            <input type="checkbox" id="remember-me" class="checkbox-input" checked>
                            <label for="remember-me" class="checkbox-label">Remember me</label>
                        </div>
                        <a href="#" class="forgot-password">Forgot password?</a>
                    </div>

                    <button type="submit" name="login" class="auth-btn">Login</button>
                </form>
                <div class="auth-footer">
                    Don't have an account? <a href="{{ route('auth.register.page') }}" class="auth-link">Register here</a>
                </div>
            </div>
        </div>
    </main>
@endsection

@extends('layouts.app')
@section('title', 'Register')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom/register.css?v=' . time()) }}">
@endpush
@section('content')
    <main>
        <div class="auth-container">
            <div class="auth-card">
                <h2 class="auth-title">Register to Your Account</h2>
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
                    <span class="auth-divider-text">or register with email</span>
                </div>

                <form class="auth-form" id="register-form" action="{{ route('auth.register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email"
                            name="email" 
                            placeholder="Enter your email" 
                            class="form-input @error('email') is-invalid @enderror" 
                            value="{{ old('email') }}" 
                            required
                        />
                        @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text"
                            name="fullname" 
                            placeholder="Enter your full name" 
                            class="form-input @error('fullname') is-invalid @enderror" 
                            value="{{ old('fullname') }}" 
                            required
                        />
                        @if($errors->has('fullname'))
                            <span class="text-danger">{{ $errors->first('fullname') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password"
                            name="password" 
                            placeholder="Enter your password" 
                            class="form-input @error('password') is-invalid @enderror" 
                            value="{{ old('password') }}" 
                            required
                        />
                        @if($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Password Confirmation</label>
                        <input type="password"
                            name="password_confirmation" 
                            placeholder="Enter your password again" 
                            class="form-input @error('password_confirmation') is-invalid @enderror" 
                            value="{{ old('password_confirmation') }}" 
                            required
                        />
                        @if($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span> 
                        @endif
                    </div>
                    <button type="submit" name="register" class="auth-btn">Register</button>
                </form>

                <div class="auth-footer">
                    Already have an account? <a href="{{ route('auth.login.page') }}" class="auth-link">Login here</a>
                </div>
            </div>
        </div>
    </main>
@endsection

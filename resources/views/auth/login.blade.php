@extends('layouts.app')
@section('content')
<main class="container">
    <div class="row justify-content-center cs mt-5 pt-5">
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
            <div class="card shadow p-4">
                <h3 class="text-center mb-4">Đăng nhập</h3>
                <form method="post" action="{{ route('auth.login') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Tên đăng nhập</label>
                        <input type="text" placeholder="Tên đăng nhập" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" >
                        @if ($errors->has('username'))
                            <span class="text-danger">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mật khẩu</label>
                        <input type="password" placeholder="Mật khẩu" name="password" class="form-control @error('password') is-invalid @enderror">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-user-check"></i> Đăng nhập</button>
                </form>
                <div class="mt-3 text-center">
                    Chưa có tài khoản? <a href="{{ route('auth.register.page') }}" style="text-decoration: none;">Đăng ký ngay</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection


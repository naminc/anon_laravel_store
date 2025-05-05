@extends('layouts.app')
@section('content')
<main class="container">
    <div class="row justify-content-center cs mt-5 pt-5">
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
            <div class="card shadow p-4">
                <h3 class="text-center mb-4">Đăng ký tài khoản</h3>
                <form method="post" action="{{ route('auth.register') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Tên đăng nhập</label>
                        <input type="text" name="username" class="form-control " value="" placeholder="Tên đăng nhập" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control " value="" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mật khẩu</label>
                        <input type="password" name="password" class="form-control " value="" placeholder="Mật khẩu" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-user-plus"></i> Đăng ký</button>
                </form>
                <div class="mt-3 text-center">
                    Đã có tài khoản? <a href="{{ route('auth.login.page') }}" class="text-decoration-none">Đăng nhập ngay</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection


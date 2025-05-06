@extends('layouts.app')
@section('content')
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6 col-lg-12 mt-5 pt-5">
                <div class="card p-4 shadow-sm text-center">
                    <h2 class="mb-3">Chào mừng, <span class="naminc">{{ Auth::user()->username }}</span></h2>
                    <p class="lead">Bạn đã đăng nhập thành công vào hệ thống.</p>
                    <div class="text-center">
                        <a href="{{ route('auth.logout') }}" class="btn btn-outline-danger mt-3 d-inline-block"><i
                                class="bi bi-box-arrow-right"></i> Đăng xuất</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 col-lg-12 mt-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <strong>Danh sách người dùng</strong>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle text-center">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên đăng nhập</th>
                                        <th>Email</th>
                                        <th>Ngày tạo</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($users) && is_object($users))
                                        @foreach ($users as $user)
                                            <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                            <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                <form action="{{ route('home.deleteUser', $user->id) }}" method="post"
                                                    onsubmit="return confirm('Bạn có chắc muốn xoá tài khoản này?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">Không có dữ liệu</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

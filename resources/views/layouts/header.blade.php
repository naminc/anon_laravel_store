<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">NAMINC</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Trang chủ</a>
                </li>
            </ul>
            @if (!Auth::check())
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('auth.login.page') }}" class="btn btn-primary">Đăng nhập</a>
                        <a href="{{ route('auth.register.page') }}" class="btn btn-primary">Đăng ký</a>
                    </li>
                </ul>
            @endif
            @if (Auth::check())
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                            data-bs-toggle="dropdown">
                            <img src="https://i.pravatar.cc/150?u={{ Auth::user()->username }}" class="avatar-circle">
                            {{ Auth::user()->username }} </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#userModal">Thông tin cá nhân</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="{{ route('auth.logout') }}">Đăng xuất</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>
@if (Auth::check())
<!-- Modal Thông tin cá nhân -->
<div class="modal fade" id="userModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thông tin người dùng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>Tên đăng nhập:</strong> {{ Auth::user()->username }}</p>
                <p><strong>:</strong> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="18797c7571765876797571767b367c7d6e">[email&#160;protected]</a></p>
                <p><strong>Tham gia từ:</strong> 2025-03-27 14:02:37</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
@endif
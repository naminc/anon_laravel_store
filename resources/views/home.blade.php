@extends('layouts.app')
@section('content')
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6 col-lg-12 mt-5 pt-5">
                <div class="card p-4 shadow-sm text-center">
                    <h2 class="mb-3">Chào mừng, <span class="naminc">naminc!</span></h2>
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
                        <strong>Danh sách tài khoản</strong>
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
                                    <tr>
                                        <td>9</td>
                                        <td>phong123</td>
                                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                data-cfemail="48292c2521260826292521262b39662c2d3e">[email&#160;protected]</a>
                                        </td>
                                        <td>27/03/2025</td>
                                        <td>
                                            <form action="/user/delete" method="post"
                                                onsubmit="return confirm('Bạn có chắc muốn xoá tài khoản này?');">
                                                <input type="hidden" name="id" value="9">
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>namincs</td>
                                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                data-cfemail="3253565f5b5c725c535f5b5c511c56574445">[email&#160;protected]</a>
                                        </td>
                                        <td>27/03/2025</td>
                                        <td>
                                            <form action="/user/delete" method="post"
                                                onsubmit="return confirm('Bạn có chắc muốn xoá tài khoản này?');">
                                                <input type="hidden" name="id" value="10">
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>2251120177sdadad</td>
                                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                data-cfemail="641d111d020f111324011c01080d07054a070b09">[email&#160;protected]</a>
                                        </td>
                                        <td>27/03/2025</td>
                                        <td>
                                            <form action="/user/delete" method="post"
                                                onsubmit="return confirm('Bạn có chắc muốn xoá tài khoản này?');">
                                                <input type="hidden" name="id" value="11">
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>2251120177ds</td>
                                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                data-cfemail="6b121e120d001e1c2b0e130e0702080a4508040611">[email&#160;protected]</a>
                                        </td>
                                        <td>27/03/2025</td>
                                        <td>
                                            <form action="/user/delete" method="post"
                                                onsubmit="return confirm('Bạn có chắc muốn xoá tài khoản này?');">
                                                <input type="hidden" name="id" value="13">
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>14</td>
                                        <td>namincssds</td>
                                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                data-cfemail="91f8fff2a1a1a7d1e9fff0fcf8fff2bff2fefce2e2">[email&#160;protected]</a>
                                        </td>
                                        <td>27/03/2025</td>
                                        <td>
                                            <form action="/user/delete" method="post"
                                                onsubmit="return confirm('Bạn có chắc muốn xoá tài khoản này?');">
                                                <input type="hidden" name="id" value="14">
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>15</td>
                                        <td>fdfdfdfd</td>
                                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                data-cfemail="e382878e8a8da38d828e8a8d80cd8786959087">[email&#160;protected]</a>
                                        </td>
                                        <td>27/03/2025</td>
                                        <td>
                                            <form action="/user/delete" method="post"
                                                onsubmit="return confirm('Bạn có chắc muốn xoá tài khoản này?');">
                                                <input type="hidden" name="id" value="15">
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>16</td>
                                        <td>2251120177sdadadsds</td>
                                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                data-cfemail="1a7b7e7773745a747b77737479347e7f6c697e697e69">[email&#160;protected]</a>
                                        </td>
                                        <td>27/03/2025</td>
                                        <td>
                                            <form action="/user/delete" method="post"
                                                onsubmit="return confirm('Bạn có chắc muốn xoá tài khoản này?');">
                                                <input type="hidden" name="id" value="16">
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>18</td>
                                        <td>naminc</td>
                                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                data-cfemail="3a5b5e5753547a545b57535459145e5f4c">[email&#160;protected]</a>
                                        </td>
                                        <td>27/03/2025</td>
                                        <td>
                                            <form action="/user/delete" method="post"
                                                onsubmit="return confirm('Bạn có chắc muốn xoá tài khoản này?');">
                                                <input type="hidden" name="id" value="18">
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>19</td>
                                        <td>namvjp</td>
                                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                data-cfemail="2a444b476a440447">[email&#160;protected]</a></td>
                                        <td>27/03/2025</td>
                                        <td>
                                            <form action="/user/delete" method="post"
                                                onsubmit="return confirm('Bạn có chắc muốn xoá tài khoản này?');">
                                                <input type="hidden" name="id" value="19">
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>20</td>
                                        <td>MyName</td>
                                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                data-cfemail="d4baa1adb7a6adb8bb94b2bba6b9f9b7bcb1b7bffabbbab8bdbab1">[email&#160;protected]</a>
                                        </td>
                                        <td>28/03/2025</td>
                                        <td>
                                            <form action="/user/delete" method="post"
                                                onsubmit="return confirm('Bạn có chắc muốn xoá tài khoản này?');">
                                                <input type="hidden" name="id" value="20">
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>21</td>
                                        <td>1234567</td>
                                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                data-cfemail="05696467643237353735456268646c692b666a68">[email&#160;protected]</a>
                                        </td>
                                        <td>04/04/2025</td>
                                        <td>
                                            <form action="/user/delete" method="post"
                                                onsubmit="return confirm('Bạn có chắc muốn xoá tài khoản này?');">
                                                <input type="hidden" name="id" value="21">
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>23</td>
                                        <td>TestUser</td>
                                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                data-cfemail="97f9f9e3ffe6f2e2f4d7f1f8e5fae3f2e4e3b9f0e2e5e2">[email&#160;protected]</a>
                                        </td>
                                        <td>19/04/2025</td>
                                        <td>
                                            <form action="/user/delete" method="post"
                                                onsubmit="return confirm('Bạn có chắc muốn xoá tài khoản này?');">
                                                <input type="hidden" name="id" value="23">
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

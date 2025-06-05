@extends('admin.layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Users Management</h1>
        <ol class="breadcrumb">
            <li><a href="/admin">Admin</a></li>
            <li class="active">Users</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Users List</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn bg-purple" data-toggle="modal" data-target="#addUserModal">
                        <i class="fa fa-plus"></i> Add User
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <table id="userTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>FullName</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
            @foreach ($users as $i => $user)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $user->fullname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->role === 'admin')
                            <span class="badge bg-blue text-dark">Admin</span>
                        @elseif ($user->role === 'user')
                            <span class="badge bg-green text-dark">User</span>
                        @endif
                    </td>
                    <td>
                        @if ($user->status === 'active')
                            <span class="badge bg-green">Active</span>
                        @else
                            <span class="badge bg-red">Inactive</span>
                        @endif
                    </td>
                    <td><span class="badge bg-black">{{ $user->created_at->format('d-m-Y H:i:s') }}</span></td>
                    <td><span class="badge bg-black">{{ $user->updated_at->format('d-m-Y H:i:s') }}</span></td>
                    <td>
                        <a href="" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                        <form action="" method="POST" style="display:inline-block">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete this user?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal thêm người dùng -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Thêm người dùng</h4>
            </div>
            <div class="modal-body">
                <form id="addUserForm" action="/admin/user-list" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter fullname" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <textarea class="form-control" id="address" name="address" placeholder="Nhập địa chỉ" value="" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Vai trò</label>
                        <select class="form-control" id="role" name="role" required>
                            
                        </select>
                    </div>
                    
                    
                    <button type="submit" name="add_user" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm người dùng</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal chỉnh sửa người dùng -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Chỉnh sửa người dùng</h4>
            </div>
            <div class="modal-body">
                <form id="editUserForm" action="/admin/user-list" method="post">
                    <input type="hidden" id="edit_user_id" name="user_id">
                    <div class="form-group">
                        <label for="edit_username">Tên đăng nhập</label>
                        <input type="text" class="form-control" id="edit_username" name="username" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="edit_email">Email</label>
                        <input type="email" class="form-control" id="edit_email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_fullname">Họ tên</label>
                        <input type="text" class="form-control" placeholder="Nhập họ tên" id="edit_fullname" name="fullname" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_password">Mật khẩu mới (để trống nếu không đổi)</label>
                        <input type="password" class="form-control" id="edit_password" name="password" placeholder="Nhập mật khẩu mới">
                    </div>
                    <div class="form-group">
                        <label for="edit_role">Vai trò</label>
                        <select class="form-control" id="edit_role" name="role" required>
                            <option value="user">Người dùng</option>
                            <option value="admin">Quản trị viên</option>
                            <option value="manager">Quản lý</option>
                            <option value="editor">Biên tập viên</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_phone">Số điện thoại</label>
                        <input type="text" class="form-control" id="edit_phone" name="phone" placeholder="Nhập số điện thoại">
                    </div>
                    <div class="form-group">
                        <label for="edit_address">Địa chỉ</label>
                        <textarea class="form-control" id="edit_address" name="address" placeholder="Nhập địa chỉ"></textarea>
                    </div>

                    <button type="submit" name="update_user" class="btn btn-primary"><i class="fa fa-save"></i> Lưu thay đổi</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

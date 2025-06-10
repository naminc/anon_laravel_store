@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Users Management</h1>
            <ol class="breadcrumb">
                <li><a href="/admin">Admin</a></li>
                <li class="active">Users</li>
            </ol>
        </section>
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
                                            <span class="badge bg-maroon text-dark">User</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->status === 'active')
                                            <span class="badge bg-green">Active</span>
                                        @else
                                            <span class="badge bg-red">Inactive</span>
                                        @endif
                                    </td>
                                    <td><span class="badge bg-black">{{ $user->created_at->format('d-m-Y H:i:s') }}</span>
                                    </td>
                                    <td><span class="badge bg-black">{{ $user->updated_at->format('d-m-Y H:i:s') }}</span>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#editUserModal" 
                                            data-id="{{ $user->id }}"
                                            data-fullname="{{ $user->fullname }}"
                                            data-email="{{ $user->email }}"
                                            data-password="{{ $user->password }}"
                                            data-role="{{ $user->role }}"
                                            data-status="{{ $user->status }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                            style="display:inline-block">
                                            @csrf @method('DELETE')
                                            <button onclick="return confirmDelete(event, this)"
                                                class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title"><i class="fa fa-users"></i> Add User</h4>
                </div>
                <div class="modal-body">
                    <form id="addUserForm" action="{{ route('admin.users.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="fullname">FullName</label>
                            <input type="text" class="form-control" name="fullname" placeholder="Enter fullname"
                                required @error('fullname') is-invalid @enderror value="{{ old('fullname') }}">
                            @error('fullname')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email address"
                                required @error('email') is-invalid @enderror value="{{ old('email') }}">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password"
                                required @error('password') is-invalid @enderror value="{{ old('password') }}">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" name="role" required @error('role') is-invalid @enderror value="{{ old('role') }}">
                                <option value="">Choose role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                            @error('role')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" required @error('status') is-invalid @enderror value="{{ old('status') }}">
                                <option value="">Choose status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn bg-purple"><i class="fa fa-plus"></i> Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Edit User</h4>
                </div>
                <div class="modal-body">
                    <form id="editUserForm" action="{{ route('admin.users.update') }}" method="post">
                        @csrf
                        <input type="hidden" id="edit_user_id" name="user_id" value="{{ old('user_id') }}">
                        <div class="form-group">
                            <label for="edit_email">Email</label>
                            <input type="email" class="form-control" id="edit_email" name="email" required value="{{ old('email') }}">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="edit_fullname">FullName</label>
                            <input type="text" class="form-control" placeholder="Enter fullname" id="edit_fullname"
                                name="fullname" required value="{{ old('fullname') }}">
                            @error('fullname')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="edit_password">Password</label>
                            <input type="password" class="form-control" id="edit_password" name="password"
                                placeholder="Enter password" value="{{ old('password') }}">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="edit_role">Role</label>
                            <select class="form-control" id="edit_role" name="role" required>
                                <option value="">Choose role</option>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                            @error('role')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="edit_status">Status</label>
                            <select class="form-control" id="edit_status" name="status" required>
                                <option value="">Choose status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn bg-purple"><i class="fa fa-save"></i>
                                Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    @include('components.confirm-delete')
    <script>
        $(document).ready(function () {
            $('#editUserModal').on('show.bs.modal', function (event) {
                const button = $(event.relatedTarget);
                const id = button.data('id');
                const fullname = button.data('fullname');
                const email = button.data('email');
                const password = button.data('password');
                const role = button.data('role');
                const status = button.data('status');
                $('#edit_user_id').val(id);
                $('#edit_email').val(email);
                $('#edit_fullname').val(fullname);
                $('#edit_password').val('');
                $('#edit_role').val(role);
                $('#edit_status').val(status);
            });
        });
    </script>
    @if ($errors->any() && session('form_error') === 'add')
    <script>
        $(document).ready(function() {
            $('#addUserModal').modal('show');
        });
    </script>
    @endif
    @if ($errors->any() && session('form_error') === 'update')
    <script>
        $(document).ready(function() {
            $('#editUserModal').modal('show');
        });
    </script>
    @endif
@endpush
@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Orders Management</h1>
            <ol class="breadcrumb">
                <li><a href="/admin">Admin</a></li>
                <li class="active">Orders</li>
            </ol>
        </section>
        <section class="content container-fluid">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Orders List</h3>
                    {{-- <div class="box-tools pull-right">
                        <button type="button" class="btn bg-purple" data-toggle="modal" data-target="#addUserModal">
                            <i class="fa fa-plus"></i> Add Order
                        </button>
                    </div> --}}
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="userTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    <th>Customer Email</th>
                                    <th>Total Price</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Shipping Address</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $i => $order)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td><span class="badge bg-blue">#{{ $order->id }}</span></td>
                                        <td>{{ $order->user->fullname }}</td>
                                        <td>{{ $order->user->email }}</td>
                                        <td><span class="badge bg-green">${{ number_format($order->total_price, 2) }}</span></td>
                                        <td>
                                            {!! $order->payment_method == 'pay_on_delivery'
                                                ? '<span class="badge bg-yellow">Pay on Delivery</span>'
                                                : '<span class="badge bg-info">Pay on Delivery</span>' !!}
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" class="form-control form-control-sm" style="border-radius: 10px;" onchange="this.form.submit()">
                                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <textarea class="form-control" rows="3" readonly>{{ trim($order->first_name . ' ' . 
                                               $order->last_name . ' | ' . 
                                               $order->phone . ' | ' . 
                                               $order->email . ' | ' . 
                                               $order->address . ', ' . 
                                               $order->address2 . ', ' . 
                                               $order->city . ', ' . 
                                               $order->state . ', ' . 
                                               $order->zip . ', ' . 
                                               $order->country)
                                               }}</textarea>
                                        </td>
                                        <td><span
                                                class="badge bg-green">{{ $order->created_at->format('d-m-Y H:i:s') }}</span>
                                        </td>
                                        <td><span
                                                class="badge bg-blue">{{ $order->updated_at->format('d-m-Y H:i:s') }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-success btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
              <!-- Order Statistics -->
              <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ $orders->count() }}</h3>
                            <p>Total Orders</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>${{ number_format($orders->sum('total_price'), 2) }}</h3>
                            <p>Total Revenue</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-dollar"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ $orders->where('status', 'pending')->count() }}</h3>
                            <p>Pending Orders</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-hourglass-half"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ $orders->where('status', 'delivered')->count() }}</h3>
                            <p>Delivered Orders</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-check-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- <div class="modal fade" id="addOrderModal" tabindex="-1" role="dialog" aria-labelledby="addOrderModalLabel"
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
                            <input type="email" class="form-control" id="edit_email" placeholder="Enter email address" name="email" required value="{{ old('email') }}">
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
    </div> --}}
@endsection
@push('scripts')
    @include('components.confirm-delete')
    <script>
        $(document).ready(function() {
            $('#editUserModal').on('show.bs.modal', function(event) {
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

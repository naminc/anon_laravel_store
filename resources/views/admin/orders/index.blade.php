@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Order Management</h1>
            <ol class="breadcrumb">
                <li><a href="/admin">Admin</a></li>
                <li class="active">Orders</li>
            </ol>
        </section>
        <section class="content container-fluid">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Order List</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn bg-purple" data-toggle="modal" data-target="#addOrderModal">
                            <i class="fa fa-plus"></i> Add Order
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="orderTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Note</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $i => $order)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td><span
                                                class="badge bg-blue">#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</span>
                                        </td>
                                        <td>{{ $order->user->name ?? 'N/A' }}</td>
                                        <td>{{ $order->product->name ?? 'N/A' }}</td>
                                        <td><span class="badge bg-yellow">{{ $order->quantity }}</span></td>
                                        <td><span class="badge bg-green">${{ number_format($order->total_price, 2) }}</span>
                                        </td>
                                        <td>{{ ucfirst($order->payment_method) }}</td>
                                        <td>
                                            <form action="{{ route('admin.orders.updateStatus', $order->id) }}"
                                                method="POST" class="status-form" style="display: inline;">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" class="form-control input-sm status-select"
                                                    onchange="this.form.submit()"
                                                    style="width: auto; display: inline-block;">
                                                    <option value="pending"
                                                        {{ $order->status == 'pending' ? 'selected' : '' }}
                                                        class="text-warning">Pending</option>
                                                    <option value="processing"
                                                        {{ $order->status == 'processing' ? 'selected' : '' }}
                                                        class="text-info">Processing</option>
                                                    <option value="shipped"
                                                        {{ $order->status == 'shipped' ? 'selected' : '' }}
                                                        class="text-primary">Shipped</option>
                                                    <option value="delivered"
                                                        {{ $order->status == 'delivered' ? 'selected' : '' }}
                                                        class="text-success">Delivered</option>
                                                    <option value="cancelled"
                                                        {{ $order->status == 'cancelled' ? 'selected' : '' }}
                                                        class="text-danger">Cancelled</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>{{ $order->note ? Str::limit($order->note, 30) : 'No notes' }}</td>
                                        <td><span
                                                class="badge bg-black">{{ $order->created_at->format('d-m-Y H:i') }}</span>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-success btn-sm" data-toggle="modal"
                                                data-target="#editOrderModal" data-id="{{ $order->id }}"
                                                data-user_id="{{ $order->user_id }}"
                                                data-product_id="{{ $order->product_id }}"
                                                data-quantity="{{ $order->quantity }}"
                                                data-payment_method="{{ $order->payment_method }}"
                                                data-status="{{ $order->status }}" data-note="{{ $order->note }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST"
                                                style="display:inline-block">
                                                @csrf @method('DELETE')
                                                <button onclick="return confirmDelete(event, this)"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @if ($orders->isEmpty())
                                    <tr>
                                        <td colspan="11" class="text-center">No orders found</td>
                                    </tr>
                                @endif
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

    <!-- Add Order Modal -->
    <div class="modal fade" id="addOrderModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.orders.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title"><i class="fa fa-plus"></i> Add New Order</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Customer</label>
                            <select name="user_id" class="form-control" required>
                                <option value="">-- Select Customer --</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }} ({{ $user->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Product</label>
                            <select name="product_id" class="form-control product-select" required>
                                <option value="">-- Select Product --</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" data-price="{{ $product->price }}"
                                        {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }} - ${{ $product->price }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input name="quantity" type="number" class="form-control quantity-input"
                                placeholder="Enter quantity" value="{{ old('quantity', 1) }}" min="1" required>
                            @error('quantity')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Total Price</label>
                            <input type="text" class="form-control total-price" readonly
                                placeholder="Auto calculated">
                        </div>
                        <div class="form-group">
                            <label>Payment Method</label>
                            <select name="payment_method" class="form-control" required>
                                <option value="">-- Select Payment Method --</option>
                                <option value="cash" {{ old('payment_method') == 'cash' ? 'selected' : '' }}>Cash
                                </option>
                                <option value="card" {{ old('payment_method') == 'card' ? 'selected' : '' }}>Card
                                </option>
                                <option value="paypal" {{ old('payment_method') == 'paypal' ? 'selected' : '' }}>PayPal
                                </option>
                                <option value="bank_transfer"
                                    {{ old('payment_method') == 'bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
                            </select>
                            @error('payment_method')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="processing" {{ old('status') == 'processing' ? 'selected' : '' }}>
                                    Processing</option>
                                <option value="shipped" {{ old('status') == 'shipped' ? 'selected' : '' }}>Shipped
                                </option>
                                <option value="delivered" {{ old('status') == 'delivered' ? 'selected' : '' }}>Delivered
                                </option>
                                <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled
                                </option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Note</label>
                            <textarea name="note" rows="3" class="form-control" placeholder="Enter order notes (optional)">{{ old('note') }}</textarea>
                            @error('note')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn bg-purple" type="submit"><i class="fa fa-plus"></i> Add Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Order Modal -->
    <div class="modal fade" id="editOrderModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.orders.update') }}" method="POST">
                    @csrf
                    <input type="hidden" id="edit_order_id" name="order_id">
                    <div class="modal-header">
                        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Order</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Customer</label>
                            <select name="user_id" class="form-control" id="edit_user_id" required>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Product</label>
                            <select name="product_id" class="form-control product-select" id="edit_product_id" required>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                        {{ $product->name }} - ${{ $product->price }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input name="quantity" type="number" class="form-control quantity-input" id="edit_quantity"
                                placeholder="Enter quantity" min="1" required>
                            @error('quantity')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Total Price</label>
                            <input type="text" class="form-control total-price" readonly
                                placeholder="Auto calculated">
                        </div>
                        <div class="form-group">
                            <label>Payment Method</label>
                            <select name="payment_method" class="form-control" id="edit_payment_method" required>
                                <option value="cash">Cash</option>
                                <option value="card">Card</option>
                                <option value="paypal">PayPal</option>
                                <option value="bank_transfer">Bank Transfer</option>
                            </select>
                            @error('payment_method')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control" id="edit_status" required>
                                <option value="pending">Pending</option>
                                <option value="processing">Processing</option>
                                <option value="shipped">Shipped</option>
                                <option value="delivered">Delivered</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Note</label>
                            <textarea name="note" rows="3" class="form-control" id="edit_note"
                                placeholder="Enter order notes (optional)"></textarea>
                            @error('note')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn bg-purple" type="submit"><i class="fa fa-save"></i> Update Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Calculate total price
        function calculateTotalPrice(modal) {
            const productSelect = modal.find('.product-select');
            const quantityInput = modal.find('.quantity-input');
            const totalPriceInput = modal.find('.total-price');

            const selectedProduct = productSelect.find(':selected');
            const price = parseFloat(selectedProduct.data('price')) || 0;
            const quantity = parseInt(quantityInput.val()) || 0;
            const total = price * quantity;

            totalPriceInput.val('$' + total.toFixed(2));
        }

        // Add order modal calculations
        $('#addOrderModal').on('change', '.product-select, .quantity-input', function() {
            calculateTotalPrice($('#addOrderModal'));
        });

        // Edit order modal calculations
        $('#editOrderModal').on('change', '.product-select, .quantity-input', function() {
            calculateTotalPrice($('#editOrderModal'));
        });

        // Edit order modal population
        $('#editOrderModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var modal = $(this);

            modal.find('#edit_order_id').val(button.data('id'));
            modal.find('#edit_user_id').val(button.data('user_id'));
            modal.find('#edit_product_id').val(button.data('product_id'));
            modal.find('#edit_quantity').val(button.data('quantity'));
            modal.find('#edit_payment_method').val(button.data('payment_method'));
            modal.find('#edit_status').val(button.data('status'));
            modal.find('#edit_note').val(button.data('note'));

            // Calculate total price
            calculateTotalPrice(modal);
        });

        // Confirm delete function
        function confirmDelete(event, button) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    button.closest('form').submit();
                }
            });
            return false;
        }

        // Initialize DataTable if available
        $(document).ready(function() {
            if ($.fn.DataTable) {
                $('#orderTable').DataTable({
                    "responsive": true,
                    "autoWidth": false,
                    "order": [
                        [0, "desc"]
                    ],
                    "pageLength": 25
                });
            }
        });
    </script>
@endpush

@push('styles')
    <style>
        .status-select {
            border: none;
            background: transparent;
            font-weight: bold;
            padding: 2px 5px;
            border-radius: 3px;
        }

        .status-select option[value="pending"] {
            background-color: #f39c12;
            color: white;
        }

        .status-select option[value="processing"] {
            background-color: #3c8dbc;
            color: white;
        }

        .status-select option[value="shipped"] {
            background-color: #0073b7;
            color: white;
        }

        .status-select option[value="delivered"] {
            background-color: #00a65a;
            color: white;
        }

        .status-select option[value="cancelled"] {
            background-color: #dd4b39;
            color: white;
        }

        .small-box {
            margin-bottom: 20px;
        }
    </style>
@endpush

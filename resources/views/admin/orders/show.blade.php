@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Order #{{ $order->id }} Details</h1>
        <ol class="breadcrumb">
            <li><a href="/admin">Admin</a></li>
            <li><a href="/admin/orders">Orders</a></li>
            <li class="active">Order #{{ $order->id }}</li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="box box-primary">
            <div class="box-body">
                <h4>Customer Info</h4>
                <p><strong>Name:</strong> {{ $order->user->fullname }}</p>
                <p><strong>Email:</strong> {{ $order->user->email }}</p>

                <h4>Shipping Info</h4>
                <p><strong>Name:</strong> {{ $order->first_name }} {{ $order->last_name }}</p>
                <p><strong>Phone:</strong> {{ $order->phone }}</p>
                <p><strong>Email:</strong> {{ $order->email }}</p>
                <p><strong>Address:</strong> {{ $order->address }}, {{ $order->address2 }}, {{ $order->city }}, {{ $order->state }}, {{ $order->zip }}, {{ $order->country }}</p>

                <h4>Payment</h4>
                <p><strong>Method:</strong> {{ $order->payment_method == 'pay_on_delivery' ? 'Pay on Delivery' : 'Pay on Delivery' }}</p>
                <p><strong>Status:</strong>
                    {!! $order->status == 'pending'
                        ? '<span class="badge bg-yellow">Pending</span>'
                        : ($order->status == 'processing'
                            ? '<span class="badge bg-info">Processing</span>'
                            : ($order->status == 'shipped'
                                ? '<span class="badge bg-primary">Shipped</span>'
                                : ($order->status == 'delivered'
                                    ? '<span class="badge bg-green">Delivered</span>'
                                    : '<span class="badge bg-danger">Cancelled</span>'))) !!}
                </p>
                <p><strong>Total:</strong> <span class="badge bg-green">${{ number_format($order->total_price, 2) }}</span></p>

                <h4>Order Items</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->details as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>${{ number_format($item->price, 2) }}</td>
                                <td>${{ number_format($item->quantity * $item->price, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h4>Note</h4>
                <p><textarea class="form-control" rows="3" readonly>{{ $order->note }}</textarea></p>
            </div>
        </div>
    </section>
</div>
@endsection

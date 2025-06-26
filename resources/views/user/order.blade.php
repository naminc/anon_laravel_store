@extends('layouts.app')
@section('title', 'Order')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom/order-detail.css') }}">
@endpush

@section('content')
    <main>
        <div class="order-details-container">
            <div class="container">
                <!-- Breadcrumb -->
                <div class="breadcrumb">
                    <a href="{{ route('home.page') }}" class="breadcrumb-item">Home</a>
                    <span class="breadcrumb-separator">
                        <ion-icon name="chevron-forward-outline"></ion-icon>
                    </span>
                    <a href="{{ route('user.profile') }}" class="breadcrumb-item">My Account</a>
                    <span class="breadcrumb-separator">
                        <ion-icon name="chevron-forward-outline"></ion-icon>
                    </span>
                    <span class="breadcrumb-item active">Order Details</span>
                </div>

                <!-- Order Header -->
                <div class="order-header">
                    <div class="order-header-top">
                        <div>
                            <h1 class="order-title">Order #ORD-{{ $order->id }}</h1>
                            <p class="order-date">Placed on {{ $order->created_at->format('d/m/Y H:i:s') }}</p>
                        </div>
                        <span class="order-status-large status-{{ $order->status }}">{{ ucfirst($order->status) }}</span>
                    </div>

                    <div class="order-actions">
                        <a href="//zalo.me/{{ $setting->phone }}" class="action-btn btn-outline">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                            Contact Support
                        </a>
                    </div>
                </div>

                <!-- Order Content -->
                <div class="order-content">
                    <!-- Main Content -->
                    <div class="order-main">
                        <!-- Order Items -->
                        <div class="section-card">
                            <h2 class="section-title">
                                <ion-icon name="bag-outline"></ion-icon>
                                Order Items ({{ $order->details->count() }} items)
                            </h2>
                            @foreach ($order->details as $detail)
                                <div class="order-item">
                                    <img src="{{ asset($detail->product->images) }}" alt="{{ $detail->product->name }}"
                                        class="item-image">
                                    <div class="item-details">
                                        <h3 class="item-name">{{ $detail->product->name }}</h3>
                                        <div class="item-price-qty">
                                            <span class="item-price">${{ number_format($detail->price, 2) }}</span>
                                            <span class="item-quantity">Quantity: {{ $detail->quantity }}</span>
                                        </div>
                                        <div class="item-actions">
                                            <a href="{{ route('home.page') }}" class="item-action-btn">Buy Again</a>
                                            <a href="{{ route('home.page') }}" class="item-action-btn">Return Item</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Customer Service -->
                        <div class="section-card">
                            <div class="customer-service">
                                <h3 class="service-title">Need Help?</h3>
                                <p class="service-description">
                                    Have questions about your order? Our customer service team is here to help.
                                </p>
                                <a href="//zalo.me/{{ $setting->phone }}" class="contact-btn">
                                    <ion-icon name="chatbubble-outline"></ion-icon>
                                    Contact Support
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="order-sidebar">
                        <!-- Order Summary -->
                        <div class="section-card">
                            <h2 class="section-title">
                                <ion-icon name="receipt-outline"></ion-icon>
                                Order Summary
                            </h2>
                            <div class="summary-row">
                                <span class="summary-label">Subtotal ({{ $order->details->count() }} items)</span>
                                <span class="summary-value">
                                    ${{ number_format(($order->total_price - 5) / 1.1, 2) }}
                                </span>
                            </div>
                            
                            <div class="summary-row">
                                <span class="summary-label">Shipping & Handling</span>
                                <span class="summary-value">$5.00</span>
                            </div>
                            
                            <div class="summary-row">
                                <span class="summary-label">Tax</span>
                                <span class="summary-value">
                                    ${{ number_format((($order->total_price - 5) / 1.1) * 0.1, 2) }}
                                </span>
                            </div>
                            
                            <div class="summary-row">
                                <span class="summary-total-label">Total</span>
                                <span class="summary-total-value">${{ number_format($order->total_price, 2) }}</span>
                            </div>                            
                        </div>



                        <!-- Addresses -->
                        <div class="section-card">
                            <h2 class="section-title">
                                <ion-icon name="home-outline"></ion-icon>
                                Delivery Information
                            </h2>

                            <div class="address-card">
                                <h3 class="address-title">
                                    <ion-icon name="location-outline"></ion-icon>
                                    Shipping Address
                                </h3>
                                <div class="address-content">
                                    {{ $order->first_name }} {{ $order->last_name }}<br>
                                    {{ $order->address }}<br>
                                    {{ $order->city }}, {{ $order->state }} {{ $order->zip }}<br>
                                    {{ $order->country }}<br>
                                    {{ $order->phone }}<br>
                                    {{ $order->email }}
                                </div>
                            </div>
                        </div>

                          <!-- Note -->
                          <div class="section-card">
                            <h2 class="section-title">
                                <ion-icon name="chatbubble-outline"></ion-icon>
                                Order Note
                            </h2>

                            <div class="address-card">
                                <div class="address-content">
                                    {{ $order->note }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

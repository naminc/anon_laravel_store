@extends('layouts.app')
@section('title', 'Profile')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom/account.css') }}">
@endpush

@section('content')
    <main>
        <div class="account-container">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" class="breadcrumb-item">Home</a>
                    <span class="breadcrumb-separator">
                        <ion-icon name="chevron-forward-outline"></ion-icon>
                    </span>
                    <span class="breadcrumb-item active">My Account</span>
                </div>

                <h2 class="account-title">My Account</h2>

                <!-- Account Information Section -->
                <div class="account-content ">
                    <div class="section-title">
                        Account Details
                    </div>

                    <div class="profile-view" id="profile-view">
                        <form>
                            <div class="form-group">
                                <label for="first-name" class="form-label">Full Name *</label>
                                <input type="text" id="first-name" class="form-input" value="{{ $user->fullname }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" id="email" class="form-input" value="{{ $user->email }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="created-at" class="form-label">Created At *</label>
                                <input type="text" id="created-at" class="form-input" value="{{ $user->created_at->format('d/m/Y H:i:s') }}"
                                    readonly>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="save-btn">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Account Information Section -->
                <div class="account-content">
                    <div class="section-title">
                        Change Password
                    </div>

                    <div class="profile-view" id="profile-view">
                        <form>
                            <div class="form-group">
                                <label for="old-password" class="form-label">Old Password *</label>
                                <input type="password" id="old-password" placeholder="Enter your old password" class="form-input" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="new-password" class="form-label">New Password *</label>
                                <input type="password" id="new-password" placeholder="Enter your new password" class="form-input" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm-password" class="form-label">Confirm Password *</label>
                                <input type="password" id="confirm-password" placeholder="Enter your confirm password" class="form-input" value="" required>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="save-btn">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Order History Section -->
                <div class="account-content">
                    <div class="section-title">Order History</div>

                    <div class="order-history">
                        <table class="order-table">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td class="order-id">#ORD-{{ $order->id }}</td>
                                    <td class="order-date">{{ $order->created_at->format('d/m/Y H:i:s') }}</td>
                                    <td><span class="order-status status-{{ $order->status }}">{{ ucfirst($order->status) }}</span></td>
                                    <td class="order-total">${{ number_format($order->total_price, 2) }}</td>
                                    <td><a href="" class="view-btn" data-order="ORD-{{ $order->id }}">View</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

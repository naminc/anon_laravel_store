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
                <div class="account-content ">
                    <div class="section-title">
                        Account Details
                    </div>

                    <div class="profile-view" id="profile-view">
                        <form action="{{ route('user.profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="first-name" class="form-label">Full Name *</label>
                                <input type="text" id="first-name"
                                       name="fullname"
                                       class="form-input @error('fullname') is-invalid @enderror"
                                       value="{{ old('fullname', $user->fullname) }}"
                                       placeholder="Enter your full name"
                                       required>
                                @error('fullname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" id="email"
                                       name="email"
                                       class="form-input @error('email') is-invalid @enderror"
                                       value="{{ old('email', $user->email) }}"
                                       placeholder="Enter your email address"
                                       required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
                        <form action="{{ route('user.profile.change-password') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="old-password" class="form-label">Old Password *</label>
                                <input type="password" id="old-password" name="old_password" placeholder="Enter your old password" class="form-input @error('old_password') is-invalid @enderror" value="" required>
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="new-password" class="form-label">New Password *</label>
                                <input type="password" id="new-password" name="new_password" placeholder="Enter your new password" class="form-input @error('new_password') is-invalid @enderror" value="" required>
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="confirm-password" class="form-label">Confirm Password *</label>
                                <input type="password" id="confirm-password" name="new_password_confirmation" placeholder="Enter your confirm password" class="form-input @error('new_password_confirmation') is-invalid @enderror" value="" required>
                                @error('new_password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
                                    <td><a href="{{ route('user.orders.show', $order->id) }}" class="view-btn" data-order="ORD-{{ $order->id }}">View</a></td>
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
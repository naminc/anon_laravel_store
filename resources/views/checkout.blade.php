@extends('layouts.app')
@section('title', 'Checkout')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom/checkout.css') }}">
@endpush

@section('content')
    <main>
        <div class="checkout-container">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ route('home.page') }}" class="breadcrumb-item">Home</a>
                    <span class="breadcrumb-separator">
                        <ion-icon name="chevron-forward-outline"></ion-icon>
                    </span>
                    <a href="{{ route('cart.page') }}" class="breadcrumb-item">Cart</a>
                    <span class="breadcrumb-separator">
                        <ion-icon name="chevron-forward-outline"></ion-icon>
                    </span>
                    <span class="breadcrumb-item active">Checkout</span>
                </div>

                <h2 class="checkout-title">Checkout</h2>

                <div class="checkout-content">
                    <div class="checkout-form-container">
                      <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf
                
                        <!-- Shipping Information Section -->

                        <div class="checkout-section">
                            <h3 class="section-title">Shipping Information</h3>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="first-name" class="form-label">First Name *</label>
                                        <input type="text" id="first-name" value="{{ old('first_name') }}" @error('first_name') is-invalid @enderror placeholder="Enter your first name" class="form-input" required name="first_name">
                                        @error('first_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="last-name" class="form-label">Last Name *</label>
                                        <input type="text" id="last-name" value="{{ old('last_name') }}" @error('last_name') is-invalid @enderror placeholder="Enter your last name" class="form-input" required name="last_name">
                                        @error('last_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" id="email" value="{{ old('email') }}" @error('email') is-invalid @enderror placeholder="Enter your email address" class="form-input" required name="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="form-label">Phone Number *</label>
                                    <input type="tel" id="phone" value="{{ old('phone') }}" @error('phone') is-invalid @enderror placeholder="Enter your phone number" class="form-input" required name="phone">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address" class="form-label">Street Address *</label>
                                    <input type="text" id="address" value="{{ old('address') }}" @error('address') is-invalid @enderror placeholder="Enter your street address" class="form-input" required name="address">
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="address2" class="form-label">Apartment, suite, etc. (optional)</label>
                                    <input type="text" id="address2" placeholder="Enter your apartment, suite, etc." class="form-input" name="address2">
                                </div>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="city" class="form-label">City *</label>
                                        <input type="text" id="city" value="{{ old('city') }}" @error('city') is-invalid @enderror placeholder="Enter your city" class="form-input" required name="city">
                                        @error('city')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="state" class="form-label">State/Province *</label>
                                        <input type="text" id="state" value="{{ old('state') }}" @error('state') is-invalid @enderror placeholder="Enter your state/province" class="form-input" required name="state">
                                        @error('state')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="zip" class="form-label">Postal Code *</label>
                                        <input type="text" id="zip" value="{{ old('zip') }}" @error('zip') is-invalid @enderror placeholder="Enter your postal code" maxlength="5" minlength="5" class="form-input" required name="zip">
                                        @error('zip')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="country" class="form-label">Country *</label>
                                        <select id="country" value="{{ old('country') }}" @error('country') is-invalid @enderror class="form-input" required name="country">
                                            <option value="">Select Country</option>
                                            <option value="US">United States</option>
                                            <option value="CA">Canada</option>
                                            <option value="UK">United Kingdom</option>
                                            <option value="AU">Australia</option>
                                            <option value="FR">France</option>
                                            <option value="DE">Germany</option>
                                            <option value="JP">Japan</option>
                                        </select>
                                        @error('country')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label for="note" class="form-label">Note (optional)</label>
                                    <textarea id="note" placeholder="Enter your note" class="form-input" name="note" rows="3"></textarea>
                                </div>

                        </div>
                        <div class="checkout-section">
                            <h3 class="section-title">Payment Method</h3>
                            <div class="payment-methods">
                                <label class="payment-method active">
                                    <input type="radio" name="payment_method" class="payment-radio"
                                        value="pay_on_delivery" checked @error('payment_method') is-invalid @enderror>
                                    @error('payment_method')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <span class="payment-method-name">Pay on Delivery</span>
                                </label>
                            </div>
                        </div>

                    </div>

                    <!-- Order Summary Section -->
                    <div class="order-summary">
                        <h3 class="summary-title">Order Summary</h3>
                        <div class="order-items">
                            @foreach ($cart as $item)
                                <div class="order-item">
                                    <img src="{{ asset($item->product->images) }}" alt="{{ $item->product->name }}"
                                        class="item-img">
                                    <div class="item-details">
                                        <h4 class="item-name">{{ $item->product->name }}</h4>
                                    </div>
                                    <div>
                                        <span class="item-price">${{ $item->product->price }}</span>
                                        <span class="item-quantity">x{{ $item->quantity }}</span>
                                    </div>
                                </div>
                            @endforeach
                            <div class="order-item">
                                <div>
                                    <span class="item-price">Shipping</span>
                                    <span class="item-quantity">$5.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="summary-divider"></div>
                        @php
                            $subtotal = $cart->sum(fn($item) => $item->product->price * $item->quantity);
                            $tax = $subtotal * 0.1;
                            $shipping = 5.0;
                            $total = $subtotal + $tax + $shipping;
                        @endphp
                        <div class="summary-item">
                            <span class="summary-item-name">Subtotal</span>
                            <span class="summary-item-price">${{ number_format($subtotal, 2) }}</span>
                        </div>

                        <div class="summary-item">
                            <span class="summary-item-name">Shipping</span>
                            <span class="summary-item-price">${{ number_format($shipping, 2) }}</span>
                        </div>

                        <div class="summary-item">
                            <span class="summary-item-name">Tax</span>
                            <span class="summary-item-price">${{ number_format($tax, 2) }} (10%)</span>
                        </div>

                        <div class="summary-divider"></div>

                        <div class="summary-item">
                            <span class="summary-item-name summary-total">Total</span>
                            <span class="summary-item-price summary-total">${{ number_format($total, 2) }}</span>
                        </div>


                        <div class="summary-divider"></div>


                        <div class="checkbox-group terms-checkbox">
                            <input type="checkbox" id="terms" class="checkbox-input" required>
                            <label for="terms" class="checkbox-label">I agree to the <a href="#"
                                    class="terms-link">terms and conditions</a></label>
                        </div>
                        <button type="submit" class="checkout-btn" id="place-order-btn">Place Order</button>

                        <div class="secure-checkout">
                            <ion-icon name="lock-closed"></ion-icon>
                            <span>Secure checkout - Your data is protected</span>
                        </div>

                        <div class="card-icons">
                            <img src="http://tybe.me/uploads/img_682aec862577a.png" alt="Visa" class="card-icon">
                            <img src="http://tybe.me/uploads/img_682aecd74d3f4.png" alt="American Express"
                                class="card-icon">
                            <img src="http://tybe.me/uploads/img_682aed5e5efa8.png" alt="PayPal" class="card-icon">
                            <img src="http://tybe.me/uploads/img_682aed8870d37.png" alt="Apple Pay" class="card-icon">
                            <img src="http://tybe.me/uploads/img_682aeda76c0a6.png" alt="Google Pay" class="card-icon">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
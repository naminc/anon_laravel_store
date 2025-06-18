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
          <a href="index.html" class="breadcrumb-item">Home</a>
          <span class="breadcrumb-separator">
            <ion-icon name="chevron-forward-outline"></ion-icon>
          </span>
          <a href="cart.html" class="breadcrumb-item">Cart</a>
          <span class="breadcrumb-separator">
            <ion-icon name="chevron-forward-outline"></ion-icon>
          </span>
          <span class="breadcrumb-item active">Checkout</span>
        </div>

        <h2 class="checkout-title">Checkout</h2>

        <div class="checkout-content">
          <div class="checkout-form-container">
            <!-- Shipping Information Section -->
            <div class="checkout-section">
              <h3 class="section-title">Shipping Information</h3>
              <form id="shipping-form">
                <div class="form-row">
                  <div class="form-group">
                    <label for="first-name" class="form-label">First Name *</label>
                    <input type="text" id="first-name" class="form-input" required>
                  </div>
                  <div class="form-group">
                    <label for="last-name" class="form-label">Last Name *</label>
                    <input type="text" id="last-name" class="form-input" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="email" class="form-label">Email Address *</label>
                  <input type="email" id="email" class="form-input" required>
                </div>

                <div class="form-group">
                  <label for="phone" class="form-label">Phone Number *</label>
                  <input type="tel" id="phone" class="form-input" required>
                </div>

                <div class="form-group">
                  <label for="address" class="form-label">Street Address *</label>
                  <input type="text" id="address" class="form-input" required>
                </div>

                <div class="form-group">
                  <label for="address2" class="form-label">Apartment, suite, etc. (optional)</label>
                  <input type="text" id="address2" class="form-input">
                </div>

                <div class="form-row">
                  <div class="form-group">
                    <label for="city" class="form-label">City *</label>
                    <input type="text" id="city" class="form-input" required>
                  </div>
                  <div class="form-group">
                    <label for="state" class="form-label">State/Province *</label>
                    <input type="text" id="state" class="form-input" required>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group">
                    <label for="zip" class="form-label">Postal Code *</label>
                    <input type="text" id="zip" class="form-input" required>
                  </div>
                  <div class="form-group">
                    <label for="country" class="form-label">Country *</label>
                    <select id="country" class="form-input" required>
                      <option value="">Select Country</option>
                      <option value="US">United States</option>
                      <option value="CA">Canada</option>
                      <option value="UK">United Kingdom</option>
                      <option value="AU">Australia</option>
                      <option value="FR">France</option>
                      <option value="DE">Germany</option>
                      <option value="JP">Japan</option>
                    </select>
                  </div>
                </div>

                <div class="checkbox-group">
                  <input type="checkbox" id="save-info" class="checkbox-input">
                  <label for="save-info" class="checkbox-label">Save this information for next time</label>
                </div>
              </form>
            </div>



            <!-- Payment Method Section -->
            <div class="checkout-section">
              <h3 class="section-title">Payment Method</h3>
              <div class="payment-methods">

                <label class="payment-method active">
                  <input type="radio" name="payment-method" class="payment-radio" value="pay-on-delivery" checked>
                  <span class="payment-method-name">Pay on Delivery</span>
                  <img src="http://tybe.me/uploads/img_682aee4f8f6f0.png" alt="debit card" class="payment-icon">
                </label>
              </div>

            </div>
          </div>

          <!-- Order Summary Section -->
          <div class="order-summary">
            <h3 class="summary-title">Order Summary</h3>
            
            <div class="order-items">
              <div class="order-item">
                <img src="/assets/images/products/jacket-3.jpg" alt="Mens Winter Leathers Jackets" class="item-img">
                <div class="item-details">
                  <h4 class="item-name">Mens Winter Leathers Jackets</h4>
                  <p class="item-variant">Size: M | Color: Black</p>
                </div>
                <div>
                  <span class="item-price">$48.00</span>
                  <span class="item-quantity">x1</span>
                </div>
              </div>

              <div class="order-item">
                <img src="/assets/images/products/shirt-1.jpg" alt="Pure Garment Dyed Cotton Shirt" class="item-img">
                <div class="item-details">
                  <h4 class="item-name">Pure Garment Dyed Cotton Shirt</h4>
                  <p class="item-variant">Size: L | Color: Blue</p>
                </div>
                <div>
                  <span class="item-price">$45.00</span>
                  <span class="item-quantity">x2</span>
                </div>
              </div>

              <div class="order-item">
                <img src="/assets/images/products/watch-1.jpg" alt="Smart watche Vital Plus" class="item-img">
                <div class="item-details">
                  <h4 class="item-name">Smart watche Vital Plus</h4>
                  <p class="item-variant">Color: Black</p>
                </div>
                <div>
                  <span class="item-price">$100.00</span>
                  <span class="item-quantity">x1</span>
                </div>
              </div>
            </div>

            <div class="summary-divider"></div>

            <div class="summary-item">
              <span class="summary-item-name">Subtotal</span>
              <span class="summary-item-price">$238.00</span>
            </div>

            <div class="summary-item">
              <span class="summary-item-name">Shipping</span>
              <span class="summary-item-detail">Standard Shipping - $10.00</span>
            </div>

            <div class="summary-item">
              <span class="summary-item-name">Tax</span>
              <span class="summary-item-price">$23.80</span>
            </div>

            <div class="summary-divider"></div>

            <div class="summary-item">
              <span class="summary-item-name summary-total">Total</span>
              <span class="summary-item-price summary-total">$271.80</span>
            </div>

            <div class="checkbox-group terms-checkbox">
              <input type="checkbox" id="terms" class="checkbox-input" required>
              <label for="terms" class="checkbox-label">I agree to the <a href="#" class="terms-link">terms and conditions</a></label>
            </div>

            <button type="submit" class="checkout-btn" id="place-order-btn">Place Order</button>

            <div class="secure-checkout">
              <ion-icon name="lock-closed"></ion-icon>
              <span>Secure checkout - Your data is protected</span>
            </div>

            <div class="card-icons">
              <img src="http://tybe.me/uploads/img_682aec862577a.png" alt="Visa" class="card-icon">
              <img src="http://tybe.me/uploads/img_682aecd74d3f4.png" alt="American Express" class="card-icon">
              <img src="http://tybe.me/uploads/img_682aed5e5efa8.png" alt="PayPal" class="card-icon">
              <img src="http://tybe.me/uploads/img_682aed8870d37.png" alt="Apple Pay" class="card-icon">
              <img src="http://tybe.me/uploads/img_682aeda76c0a6.png" alt="Google Pay" class="card-icon">
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection

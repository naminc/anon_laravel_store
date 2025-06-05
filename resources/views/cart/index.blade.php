@extends('layouts.app')
@section('title', 'Cart')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom/cart.css?v=' . time()) }}">
@endpush
@section('content')
<main>
    <div class="cart-container">
      <div class="container">
        <h2 class="cart-title">Shopping Cart</h2>

        <div class="cart-content">
          <div class="cart-items">
            <table class="cart-table">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Remove</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-label="Product">
                    <div class="cart-product">
                      <img src="/assets/images/products/jacket-3.jpg" alt="Mens Winter Leathers Jackets" class="cart-product-img">
                      <div>
                        <h3 class="cart-product-title">Mens Winter Leathers Jackets</h3>
                        <p class="cart-product-info">Size: M | Color: Black</p>
                      </div>
                    </div>
                  </td>
                  <td data-label="Price" class="cart-price">$48.00</td>
                  <td data-label="Quantity">
                    <div class="cart-quantity">
                      <button class="quantity-btn">
                        <ion-icon name="remove-outline"></ion-icon>
                      </button>
                      <input type="number" class="quantity-input" value="1" min="1" max="10">
                      <button class="quantity-btn">
                        <ion-icon name="add-outline"></ion-icon>
                      </button>
                    </div>
                  </td>
                  <td data-label="Total" class="cart-price">$48.00</td>
                  <!-- Update the remove button cell to add the new class -->
                  <td data-label="Remove" class="remove-cell">
                    <button class="remove-btn">
                      <ion-icon name="trash-outline"></ion-icon>
                    </button>
                  </td>
                </tr>

                <tr>
                  <td data-label="Product">
                    <div class="cart-product">
                      <img src="/assets/images/products/shirt-1.jpg" alt="Pure Garment Dyed Cotton Shirt" class="cart-product-img">
                      <div>
                        <h3 class="cart-product-title">Pure Garment Dyed Cotton Shirt</h3>
                        <p class="cart-product-info">Size: L | Color: Blue</p>
                      </div>
                    </div>
                  </td>
                  <td data-label="Price" class="cart-price">$45.00</td>
                  <td data-label="Quantity">
                    <div class="cart-quantity">
                      <button class="quantity-btn">
                        <ion-icon name="remove-outline"></ion-icon>
                      </button>
                      <input type="number" class="quantity-input" value="2" min="1" max="10">
                      <button class="quantity-btn">
                        <ion-icon name="add-outline"></ion-icon>
                      </button>
                    </div>
                  </td>
                  <td data-label="Total" class="cart-price">$90.00</td>
                  <!-- Update the remove button cell to add the new class -->
                  <td data-label="Remove" class="remove-cell">
                    <button class="remove-btn">
                      <ion-icon name="trash-outline"></ion-icon>
                    </button>
                  </td>
                </tr>

                <tr>
                  <td data-label="Product">
                    <div class="cart-product">
                      <img src="/assets/images/products/watch-1.jpg" alt="Smart watche Vital Plus" class="cart-product-img">
                      <div>
                        <h3 class="cart-product-title">Smart watche Vital Plus</h3>
                        <p class="cart-product-info">Color: Black</p>
                      </div>
                    </div>
                  </td>
                  <td data-label="Price" class="cart-price">$100.00</td>
                  <td data-label="Quantity">
                    <div class="cart-quantity">
                      <button class="quantity-btn">
                        <ion-icon name="remove-outline"></ion-icon>
                      </button>
                      <input type="number" class="quantity-input" value="1" min="1" max="10">
                      <button class="quantity-btn">
                        <ion-icon name="add-outline"></ion-icon>
                      </button>
                    </div>
                  </td>
                  <td data-label="Total" class="cart-price">$100.00</td>
                  <!-- Update the remove button cell to add the new class -->
                  <td data-label="Remove" class="remove-cell">
                    <button class="remove-btn">
                      <ion-icon name="trash-outline"></ion-icon>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>

            <div class="cart-action-buttons">
              <a href="index.html" class="continue-shopping">Continue Shopping</a>
              <button class="update-cart">Update Cart</button>
            </div>

            <div class="coupon-container">
              <h3 class="coupon-title">Coupon Code</h3>
              <form class="coupon-form">
                <input type="text" class="coupon-input" placeholder="Enter your coupon code">
                <button type="submit" class="apply-coupon-btn">Apply Coupon</button>
              </form>
            </div>
          </div>

          <div class="cart-summary">
            <h3 class="summary-title">Order Summary</h3>
            <table class="summary-table">
              <tr>
                <th>Subtotal</th>
                <td>$238.00</td>
              </tr>
              <tr>
                <th>Shipping</th>
                <td>$10.00</td>
              </tr>
              <tr>
                <th>Tax</th>
                <td>$23.80</td>
              </tr>
              <tr>
                <th>Total</th>
                <td>$271.80</td>
              </tr>
            </table>

            <a href="/pages/checkout.html" class="checkout-btn">Proceed to Checkout</a>
          </div>
        </div>

        <!-- Empty cart state (hidden by default) -->
        <div class="cart-empty" style="display: none;">
          <ion-icon name="bag-handle-outline"></ion-icon>
          <p>Your cart is currently empty.</p>
          <a href="index.html" class="continue-shopping">Return to Shop</a>
        </div>
      </div>
    </div>
  </main>
@endsection

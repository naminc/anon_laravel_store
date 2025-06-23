@extends('layouts.app')
@section('title', 'Cart')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/custom/cart.css?v=' . time()) }}">
<style>
  .quantity-input {
    width: 50px;
    text-align: center;
    margin-left: 10px;
  }
</style>
@endpush

@section('content')
<main>
  <div class="cart-container">
    <div class="container">
      <h2 class="cart-title">Shopping Cart</h2>

      <div class="cart-content">
        <div class="cart-items">
          <form action="{{ route('cart.update') }}" method="POST">
            @csrf
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
                @if ($cart->count() > 0)
                @foreach ($cart as $item)
                <tr class="cart-item">
                  <td data-label="Product">
                    <div class="cart-product">
                      <img src="{{ asset($item->product->images) }}" alt="{{ $item->product->name }}" class="cart-product-img">
                      <div>
                        <h3 class="cart-product-title">{{ $item->product->name }}</h3>
                      </div>
                    </div>
                  </td>
                  <td data-label="Price" class="cart-price">{{ number_format($item->product->price, 2) }}$</td>
                  <td data-label="Quantity">
                    <input type="number" name="quantities[{{ $item->id }}]" value="{{ $item->quantity }}" min="1" class="quantity-input">
                  </td>
                  <td data-label="Total" class="cart-price">{{ number_format($item->product->price * $item->quantity, 2) }}$</td>
                  <td data-label="Remove">
                    <button type="button" class="remove-btn" onclick="deleteCartItem({{ $item->id }})">
                      <ion-icon name="trash-outline"></ion-icon>
                    </button>
                  </td>
                </tr>
                @endforeach
                @else
                <tr>
                  <td colspan="5" style="text-align: center;">No items in cart</td>
                </tr>
                @endif
              </tbody>
            </table>

            <div class="cart-action-buttons">
              @if ($cart->count() > 0)
              <a href="{{ route('home') }}" class="continue-shopping">Continue Shopping</a>
              @else
              <a href="{{ route('home') }}" class="continue-shopping">Return to Shop</a>
              @endif
              @if ($cart->count() > 0)
              <button type="submit" class="update-cart">Update Cart</button>
              @endif
            </div>
          </form>

          {{-- <div class="coupon-container">
            <h3 class="coupon-title">Coupon Code</h3>
            <form class="coupon-form">
              <input type="text" class="coupon-input" placeholder="Enter your coupon code">
              <button type="submit" class="apply-coupon-btn">Apply Coupon</button>
            </form>
          </div> --}}
        </div>

        <div class="cart-summary">
          <h3 class="summary-title">Order Summary</h3>
          <table class="summary-table">
            <tr>
              <th>Subtotal</th>
              <td>${{ number_format($cart->sum(fn($item) => $item->product->price * $item->quantity), 2) }}</td>
            </tr>
            <tr>
              <th>Shipping</th>
              <td>$5.00</td>
            </tr>
            <tr>
              <th>Tax</th>
              <td>$0.00</td>
            </tr>
            <tr>
              <th>Total</th>
              <td>${{ number_format($cart->sum(fn($item) => $item->product->price * $item->quantity) + 5, 2) }}</td>
            </tr>
          </table>

          <a href="{{ route('checkout.page') }}" class="checkout-btn">Proceed to Checkout</a>
        </div>
      </div>
    </div>
  </div>

  <form id="delete-form" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
  </form>
</main>
@endsection

@push('scripts')
<script>
  function deleteCartItem(id) {
    if (confirm('Remove this item?')) {
      const form = document.getElementById('delete-form');
      form.action = '/cart/remove/' + id;
      form.submit();
    }
  }
</script>
@endpush
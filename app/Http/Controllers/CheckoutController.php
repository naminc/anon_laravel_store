<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\CartServiceInterface;
use App\Http\Requests\PlaceOrderRequest;
use App\Services\Interfaces\CheckoutServiceInterface;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    protected $cartService;
    protected $checkoutService;

    public function __construct(CartServiceInterface $cartService, CheckoutServiceInterface $checkoutService)
    {
        $this->cartService = $cartService;
        $this->checkoutService = $checkoutService;
    }

    public function index()
    {
        $cart = $this->cartService->get(auth()->id());
        if ($cart->isEmpty()) {
            return redirect()->route('cart.page')->with('error', 'Your cart is empty.');
        }
        return view('checkout', compact('cart'));
    }

    public function store(PlaceOrderRequest $request)
    {
        $cart = $this->cartService->get(auth()->user()->id);
        if ($cart->isEmpty()) {
            return redirect()->route('cart.page')->with('error', 'Your cart is empty.');
        }
        try {
            $this->checkoutService->processOrder($request->validated(), $cart);
            return redirect()->route('home.page')->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Checkout failed: ' . $e->getMessage());
        }
    }
}

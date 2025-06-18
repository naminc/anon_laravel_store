<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\CartServiceInterface;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartServiceInterface $cartService)
    {
        $this->cartService = $cartService;
    }
    public function index()
    {
        $cart = $this->cartService->get(auth()->user()->id);
        return view('cart.index', compact('cart'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1'
        ]);
        $data = $request->only('product_id', 'quantity');
        $data['quantity'] = $data['quantity'] ?? 1;
        $result = $this->cartService->add($data);
        return redirect()->back()->with(
            $result ? 'success' : 'error',
            $result ? 'Product added to cart successfully' : 'Product add to cart failed'
        );
    }
    public function update(Request $request)
    {
        $request->validate([
            'quantities.*' => 'required|integer|min:1'
        ]);
        $quantities = $request->input('quantities', []);
        foreach ($quantities as $cartItemId => $quantity) {
            $this->cartService->update($cartItemId, $quantity);
        }
        return redirect()->route('cart.page')->with('success', 'Cart updated successfully');
    }
    public function remove($id)
    {
        $result = $this->cartService->delete($id);
        return redirect()->back()->with(
            $result ? 'success' : 'error',
            $result ? 'Product removed from cart successfully' : 'Product remove from cart failed'
        );
    }
}

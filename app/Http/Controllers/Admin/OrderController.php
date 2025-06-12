<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'product', 'details'])->latest()->get();
        $users = User::all();
        $products = Product::all();

        return view('admin.orders.index', compact('orders', 'users', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'payment_method' => 'required|string',
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled',
            'note' => 'nullable|string'
        ]);

        $product = Product::findOrFail($request->product_id);
        $total_price = $product->price * $request->quantity;

        Order::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $total_price,
            'payment_method' => $request->payment_method,
            'status' => $request->status,
            'note' => $request->note,
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Order created successfully!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'payment_method' => 'required|string',
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled',
            'note' => 'nullable|string'
        ]);

        $order = Order::findOrFail($request->order_id);
        $product = Product::findOrFail($request->product_id);
        $total_price = $product->price * $request->quantity;

        $order->update([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $total_price,
            'payment_method' => $request->payment_method,
            'status' => $request->status,
            'note' => $request->note,
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully!');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully!');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled'
        ]);

        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);

        return redirect()->route('admin.orders.index')->with('success', 'Order status updated successfully!');
    }
}

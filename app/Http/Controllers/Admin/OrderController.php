<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\OrderServiceInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        $orders = $this->orderService->getAll();
        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, $id) {
        $result = $this->orderService->updateStatus($id, $request->status);
        return redirect()->back()->with(
            $result ? 'success' : 'error',
            $result ? 'Order status updated successfully.' : 'Order status update failed.'
        );
    }

    public function show($id)
    {
        $order = $this->orderService->findById($id);
        return view('admin.orders.show', compact('order'));
    }
}

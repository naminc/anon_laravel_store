<?php

namespace App\Services;

use App\Services\Interfaces\CheckoutServiceInterface;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\Interfaces\OrderDetailRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
/**
 * Class CheckoutService
 * @package App\Services
 */
class CheckoutService implements CheckoutServiceInterface
{
    protected $orderRepo;
    protected $orderDetailRepo;

    public function __construct(OrderRepositoryInterface $orderRepo, OrderDetailRepositoryInterface $orderDetailRepo)
    {
        $this->orderRepo = $orderRepo;
        $this->orderDetailRepo = $orderDetailRepo;
    }

    public function processOrder(array $data, Collection $cartItems): void
    {
        DB::transaction(function () use ($data, $cartItems) {
            $subtotal = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);
            $tax = $subtotal * 0.1;
            $shipping = 5.0;
            $total = $subtotal + $tax + $shipping;
            $order = $this->orderRepo->create([
                'user_id' => auth()->id(),
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'address2' => $data['address2'] ?? null,
                'city' => $data['city'],
                'state' => $data['state'],
                'zip' => $data['zip'],
                'country' => $data['country'],
                'total_price' => $total,
                'payment_method' => $data['payment_method'],
                'note' => $data['note'] ?? null,
                'status' => 'pending',
            ]);
            foreach ($cartItems as $item) {
                $this->orderDetailRepo->create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
            }
            $cartItems->each->delete();
        });
    }
}
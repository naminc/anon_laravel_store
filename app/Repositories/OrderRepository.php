<?php

namespace App\Repositories;

use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Models\Order;

class OrderRepository implements OrderRepositoryInterface
{
    public function all()
    {
        return Order::with('user')->get();
    }
    public function create(array $data)
    {
        return Order::create($data);
    }
    public function find($id)
    {
        return Order::find($id);
    }
    public function updateStatus($id, $status)
    {
        return Order::where('id', $id)->update(['status' => $status]);
    }
    public function findByUserId($userId)
    {
        return Order::where('user_id', $userId)->with('details')->get();
    }
}

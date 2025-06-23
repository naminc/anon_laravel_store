<?php

namespace App\Repositories;

use App\Repositories\Interfaces\OrderDetailRepositoryInterface;
use App\Models\OrderDetail;
class OrderDetailRepository implements OrderDetailRepositoryInterface
{
    public function create(array $data)
    {
        return OrderDetail::create($data);
    }
}

<?php

namespace App\Services;

use App\Services\Interfaces\OrderServiceInterface;
use App\Repositories\Interfaces\OrderRepositoryInterface;
/**
 * Class OrderService
 * @package App\Services
 */
class OrderService implements OrderServiceInterface
{
    protected $orderRepo;

    public function __construct(OrderRepositoryInterface $orderRepo)
    {
        $this->orderRepo = $orderRepo;
    }
    public function getAll()
    {
        return $this->orderRepo->all();
    }
    public function findById($id)
    {
        return $this->orderRepo->find($id);
    }

    public function updateStatus($id, $status)
    {
        return $this->orderRepo->updateStatus($id, $status);
    }
    public function getByUserId($userId)
    {
        return $this->orderRepo->findByUserId($userId);
    }
}

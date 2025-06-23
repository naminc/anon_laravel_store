<?php

namespace App\Repositories\Interfaces;

interface OrderRepositoryInterface
{
    public function all();
    public function create(array $data);
    public function find($id);
    public function updateStatus($id, $status);
    public function findByUserId($userId);
}

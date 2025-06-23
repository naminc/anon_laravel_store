<?php

namespace App\Services\Interfaces;

/**
 * Interface OrderServiceInterface
 * @package App\Services\Interfaces
 */
interface OrderServiceInterface
{
    public function getAll();
    public function findById($id);
    public function updateStatus($id, $status);
    public function getByUserId($userId);
}
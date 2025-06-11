<?php

namespace App\Services\Interfaces;

/**
 * Interface ProductServiceInterface
 * @package App\Services\Interfaces
 */
interface ProductServiceInterface
{
    public function getAll();
    public function getById($id);
    public function store(array $data);
    public function update($id, array $data);
    public function delete($id);
}
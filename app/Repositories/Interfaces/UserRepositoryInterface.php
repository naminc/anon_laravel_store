<?php

namespace App\Repositories\Interfaces;

/**
 * Interface UserRepositoryInterface
 * @package App\Repositories\Interfaces
 */
interface UserRepositoryInterface
{
    public function findByEmail(string $email);
    public function create(array $data);
    public function all();
    public function find($id);
    public function update($id, array $data);
    public function delete($id);
    public function updatePassword(int $userId, string $hashedPassword): bool;
}   

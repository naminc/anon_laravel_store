<?php

namespace App\Repositories\Interfaces;

/**
 * Interface UserRepositoryInterface
 * @package App\Repositories\Interfaces
 */
interface UserRepositoryInterface
{
    public function getAllPaginate();
    public function deleteUser($id);
    public function createUser($data);
    public function updateUser($id, $data);
    public function findUser($id);
    
}

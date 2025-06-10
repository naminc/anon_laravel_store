<?php

namespace App\Services\Interfaces;

/**
 * Interface UserServiceInterface
 * @package App\Services\Interfaces
 */
interface UserServiceInterface
{
    public function getAll();
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);

}

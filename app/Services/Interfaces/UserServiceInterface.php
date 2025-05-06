<?php

namespace App\Services\Interfaces;

/**
 * Interface UserServiceInterface
 * @package App\Services\Interfaces
 */
interface UserServiceInterface
{
    public function paginate();
    public function delete($id);
    public function create($data);
    public function update($id, $data);
    public function find($id);
    
}

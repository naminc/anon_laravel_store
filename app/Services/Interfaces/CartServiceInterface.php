<?php

namespace App\Services\Interfaces;

/**
 * Interface CartServiceInterface
 * @package App\Services\Interfaces
 */
interface CartServiceInterface
{
    public function add(array $data);
    public function get($user_id);
    public function update($id, array $data);
    public function getCount($user_id);
    public function delete($id);
}

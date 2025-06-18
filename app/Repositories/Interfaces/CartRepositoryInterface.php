<?php

namespace App\Repositories\Interfaces;

interface CartRepositoryInterface
{
    public function add(array $data);
    public function get($user_id);
    public function update($id, $quantity);
    public function getCount($user_id);
    public function delete($id);
}

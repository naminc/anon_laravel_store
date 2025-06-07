<?php

namespace App\Repositories\Interfaces;

interface CategoryRepositoryInterface
{
    public function all();
    public function create(array $data);
    public function update($id, array $data);
    public function find($id);
    public function delete($id);
}

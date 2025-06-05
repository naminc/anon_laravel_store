<?php

namespace App\Repositories\Interfaces;

interface SettingRepositoryInterface
{
    public function find();
    public function update(array $data);
}

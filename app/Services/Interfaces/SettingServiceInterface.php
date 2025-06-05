<?php

namespace App\Services\Interfaces;

/**
 * Interface SettingServiceInterface
 * @package App\Services\Interfaces
 */
interface SettingServiceInterface
{
    public function get();
    public function update(array $data);
}

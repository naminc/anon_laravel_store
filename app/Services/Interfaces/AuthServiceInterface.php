<?php

namespace App\Services\Interfaces;

/**
 * Interface AuthServiceInterface
 * @package App\Services\Interfaces
 */
interface AuthServiceInterface
{
    public function register(array $data);
    public function login(array $credentials) : bool;
}

<?php

namespace App\Services\Interfaces;

use Illuminate\Support\Collection;

/**
 * Interface CheckoutServiceInterface
 * @package App\Services\Interfaces
 */
interface CheckoutServiceInterface
{
    public function processOrder(array $data, Collection $cartItems): void;
}
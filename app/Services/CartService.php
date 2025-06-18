<?php

namespace App\Services;

use App\Services\Interfaces\CartServiceInterface;
use App\Repositories\Interfaces\CartRepositoryInterface;

/**
 * Class CartService
 * @package App\Services
 */
class CartService implements CartServiceInterface
{
    protected $cartRepository;

    public function __construct(CartRepositoryInterface $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function add(array $data)
    {
        $data['user_id'] = auth()->user()->id;
        return $this->cartRepository->add($data);
    }
    public function get($user_id)
    {
        return $this->cartRepository->get($user_id);
    }
    public function update($id, $quantity)
    {
        return $this->cartRepository->update($id, $quantity);
    }
    public function getCount($user_id)
    {
        return $this->cartRepository->getCount($user_id);
    }   
    public function delete($id)
    {
        return $this->cartRepository->delete($id);
    }
}
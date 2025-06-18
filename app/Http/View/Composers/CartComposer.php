<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Services\Interfaces\CartServiceInterface;

class CartComposer
{
    protected $cartService;

    public function __construct(CartServiceInterface $cartService)
    {
        $this->cartService = $cartService;
    }

    public function compose(View $view)
    {
        $cartCount = Auth::check() ? $this->cartService->getCount(Auth::id()) : 0;
        $view->with('cartCount', $cartCount);
    }
}

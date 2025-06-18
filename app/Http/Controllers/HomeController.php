<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\ProductServiceInterface;
use App\Services\Interfaces\CategoryServiceInterface;
use App\Services\Interfaces\CartServiceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $productService;
    protected $categoryService;
    protected $cartService;
    public function __construct(ProductServiceInterface $productService, CategoryServiceInterface $categoryService, CartServiceInterface $cartService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->cartService = $cartService;
    }
    public function index()
    {
        $products = $this->productService->getAll();
        $categories = $this->categoryService->getAll();
        return view('home', compact('products', 'categories'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\ProductServiceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $productService;
    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }
    public function index()
    {
        $products = $this->productService->getAll();
        return view('home', compact('products'));
    }
}
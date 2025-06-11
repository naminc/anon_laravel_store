<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\ProductServiceInterface;
use App\Services\Interfaces\CategoryServiceInterface;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;
    public function __construct(ProductServiceInterface $productService, CategoryServiceInterface $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $products = $this->productService->getAll();
        $categories = $this->categoryService->getAll();
        return view('admin.products.index', compact('products', 'categories'));
    }
    public function store(StoreProductRequest $request)
    {
        $result = $this->productService->store($request->validated());
        return redirect()->route('admin.products.index')->with(
            $result ? 'success' : 'error',
            $result ? 'Product created successfully' : 'Product create failed'
        );
    }
    public function update(UpdateProductRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('images')) {
            $data['images'] = $request->file('images');
        }
        $result = $this->productService->update($request->product_id, $data);
        return redirect()->route('admin.products.index')->with(
            $result ? 'success' : 'error',
            $result ? 'Product updated successfully' : 'Product update failed'
        );
    }

    public function destroy($id)
    {
        $result = $this->productService->delete($id);
        return redirect()->route('admin.products.index')->with(
            $result ? 'success' : 'error',
            $result ? 'Product deleted successfully' : 'Product delete failed'
        );
    }
}

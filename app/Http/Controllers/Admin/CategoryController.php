<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\CategoryServiceInterface;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        $categories = $this->categoryService->getAll();
        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->only('name', 'description');
        $this->categoryService->store($data);
        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully');
    }
    public function update(Request $request)
    {
        $data = $request->only('name', 'description');
        $this->categoryService->update($request->category_id, $data);
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully');
    }
    public function destroy($id)
    {
        $result = $this->categoryService->delete($id);
        return redirect()->route('admin.categories.index')->with(
            $result ? 'success' : 'error',
            $result ? 'Category deleted successfully' : 'Category delete failed'
        );
    }
}
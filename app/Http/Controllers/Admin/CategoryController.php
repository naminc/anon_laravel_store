<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
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

    public function store(StoreCategoryRequest $request)
    {
        $this->categoryService->store($request->validated());
        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully');
    }
    public function update(UpdateCategoryRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon');
        }
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
<?php

namespace App\Services;

use App\Services\Interfaces\CategoryServiceInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
/**
 * Class CategoryService
 * @package App\Services
 */
class CategoryService implements CategoryServiceInterface
{
    protected $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }
    public function getAll()
    {
        return Cache::rememberForever('all_categories', function () {
            return $this->categoryRepo->all();
        });
    }
    public function getById($id)
    {
        return $this->categoryRepo->find($id);
    }
    public function store(array $data)
    {
        Cache::forget('all_categories');
        if (isset($data['icon']) && $data['icon'] instanceof \Illuminate\Http\UploadedFile) {
            $filename = time() . '_' . $data['icon']->getClientOriginalName();
            $path = $data['icon']->storeAs('uploads/categories', $filename, 'public');
            $data['icon'] = 'storage/' . $path;
        }
        return $this->categoryRepo->create($data);
    }
    public function update($id, array $data)
    {
        Cache::forget('all_categories');
        $category = $this->categoryRepo->find($id);
        if (isset($data['icon']) && $data['icon'] instanceof \Illuminate\Http\UploadedFile) {
            if ($category->icon && Storage::disk('public')->exists(str_replace('storage/', '', $category->icon))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $category->icon));
            }
            $filename = time() . '_' . $data['icon']->getClientOriginalName();
            $path = $data['icon']->storeAs('uploads/categories', $filename, 'public');
            $data['icon'] = 'storage/' . $path;
        } else {
            unset($data['icon']);
        }
        return $this->categoryRepo->update($id, $data);
    }
    public function delete($id)
    {
        Cache::forget('all_categories');
        return $this->categoryRepo->delete($id);
    }
}

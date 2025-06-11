<?php

namespace App\Services;

use App\Services\Interfaces\ProductServiceInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\Storage;
/**
 * Class ProductService
 * @package App\Services
 */
class ProductService implements ProductServiceInterface
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function getAll()
    {
        return $this->productRepository->all();
    }
    public function getById($id)
    {
        return $this->productRepository->find($id);
    }
    public function store(array $data)
    {
        if (isset($data['images']) && $data['images'] instanceof \Illuminate\Http\UploadedFile) {
            $filename = time() . '_' . $data['images']->getClientOriginalName();
            $path = $data['images']->storeAs('uploads/products', $filename, 'public');
            $data['images'] = 'storage/' . $path;
        }
        return $this->productRepository->create($data);
    }
    public function update($id, array $data)
    {
        $product = $this->productRepository->find($id);
        if (isset($data['images']) && $data['images'] instanceof \Illuminate\Http\UploadedFile) {
            if ($product->images && Storage::disk('public')->exists(str_replace('storage/', '', $product->images))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $product->images));
            }
            $filename = time() . '_' . $data['images']->getClientOriginalName();
            $path = $data['images']->storeAs('uploads/products', $filename, 'public');
            $data['images'] = 'storage/' . $path;
        } else {
            unset($data['images']);
        }
        return $this->productRepository->update($id, $data);
    }
    public function delete($id)
    {
        return $this->productRepository->delete($id);
    }
}

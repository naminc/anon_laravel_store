<?php

namespace App\Services;

use App\Services\Interfaces\ProductServiceInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
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
        return $this->productRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->productRepository->update($id, $data);
    }
    public function destroy($id)
    {
        return $this->productRepository->delete($id);
    }
}
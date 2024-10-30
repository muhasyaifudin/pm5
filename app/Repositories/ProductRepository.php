<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository
{
    public function getData(): array|Collection
    {
        $product = Product::with('category')->get();

        return $product;
    }

    public function storeData(array $data)
    {
        return Product::create($data);
    }

    public function updateData(int $id, array $data)
    {
        $category = Product::find($id);
        return $category->update($data);
    }

    public function deleteData(int $id)
    {
        $category = Product::find($id);
        return $category->delete();
    }
}
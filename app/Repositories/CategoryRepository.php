<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function getData()
    {
        return Category::all();
    }

    public function storeData(array $data)
    {
        return Category::create($data);
    }

    public function updateData(int $id, array $data)
    {
        $category = Category::find($id);
        return $category->update($data);
    }

    public function deleteData(int $id)
    {
        $category = Category::find($id);
        return $category->delete();
    }
}
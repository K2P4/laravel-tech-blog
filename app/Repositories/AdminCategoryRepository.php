<?php

namespace App\Repositories;

use App\Models\Category;

class AdminCategoryRepository

{
    public function allCategories()
    {
        $query = Category::query();
        return $query->latest()->paginate(6);
    }


    public function createCategory(array $data): Category
    {
        return Category::create($data);
    }

    public function getById(Category $category): Category
    {
        return $category;
    }

    public function updateCategory(array $data, Category $category): Category
    {
        $category->update($data);
        return $category;
    }

    public function deleteById(Category $category): bool
    {
        return $category->delete();
    }
}

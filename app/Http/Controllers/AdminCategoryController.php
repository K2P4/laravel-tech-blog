<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\AdminCategoryRepository;
use Illuminate\Validation\Rule;

class AdminCategoryController extends Controller
{

    protected AdminCategoryRepository $repo;

    public function __construct(AdminCategoryRepository $repo)
    {
        $this->repo = $repo;
    }


    public function index()
    {
        return view('admin.categories.index', [
            'categories' => $this->repo->allCategories()
        ]);
    }

    public function store(StoreCategoryRequest $request)
    {
        $validatedData = $request->validated();
        $this->repo->createCategory($validatedData);

        return redirect('/admin/categories')->with('success', 'Category created');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validatedData = $request->validated();
        $this->repo->updateCategory($validatedData, $category);
        return redirect('/admin/categories')->with('success', 'Category updated');
    }

    public function destroy(Category $category)
    {
        $this->repo->deleteById($category);
        return redirect('/admin/categories')->with('success', 'Category deleted');
    }
}

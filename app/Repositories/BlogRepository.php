<?php

namespace App\Repositories;

use App\Models\Blog;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BlogRepository
{
    public function allBlogs(array $filters = [], int $perPage = 6): LengthAwarePaginator
    {
        $query = Blog::with(['author', 'category'])->latest();

        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' . $search . '%')
                    ->orWhere('body', 'LIKE', '%' . $search . '%');
            });
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($filters['username'] ?? false, function ($query, $username) {
            $query->whereHas('author', function ($query) use ($username) {
                $query->where('username', $username);
            });
        });

        return $query->paginate($perPage)->withQueryString();
    }

    public function createBlog(array $data): Blog
    {
        return Blog::create($data);
    }

    public function getById(Blog $blog): Blog
    {
        return $blog;
    }

    public function getBySlug(string $slug): ?Blog
    {
        return Blog::where('slug', $slug)->first();
    }

    public function updateBlog(array $data, Blog $blog): Blog
    {
        $blog->update($data);
        return $blog;
    }

    public function deleteById(Blog $blog): bool
    {
        return $blog->delete();
    }

    public function random(int $count = 3)
    {
        return Blog::inRandomOrder()->take($count)->get();
    }
}

<?php

namespace App\Repositories;

use App\Models\Blog;

class AdminBlogRepository
{
    public function allBlogs()
    {
        $query = Blog::query();
        return $query->latest()->paginate(6);
    }


    public function createBlog(array $data): Blog
    {
        return Blog::create($data);
    }

    public function getById(Blog $blog): Blog
    {
        return $blog;
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
}

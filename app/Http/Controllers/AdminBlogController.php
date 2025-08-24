<?php

namespace App\Http\Controllers;

use App\Http\Requests\Blog\StoreBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Repositories\AdminBlogRepository;
use App\Services\CloudinaryService;
use Illuminate\Support\Facades\Auth;

class AdminBlogController extends Controller
{

    protected AdminBlogRepository $repo;
    protected CloudinaryService $cloudinary;

    public function __construct(AdminBlogRepository $repo, CloudinaryService $cloudinary)
    {
        $this->repo = $repo;
        $this->cloudinary = $cloudinary;
    }

    public function create()
    {
        return view(
            'admin.blogs.store',
            [
                'categories' => Category::all()
            ],

        );
    }

    public function store(StoreBlogRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['user_id'] = Auth::id();
        if (request()->hasFile('thumbnail')) {
            $file = request()->file('thumbnail');
            $validatedData['thumbnail'] = $this->cloudinary->uploadFile($file, 'laravel-tech-blog/thumbnails');
        } else {
            $validatedData['thumbnail'] = null;
        }

        $this->repo->createBlog($validatedData);
        return redirect('/admin/blogs')->with('success', 'Blog created');
    }


    public function index()
    {
        return view(
            'admin.blogs.index',
            ['blogs' => $this->repo->allBlogs()]
        );
    }


    public function destory(Blog $blog)
    {
        $this->cloudinary->destroyByUrl($blog->thumbnail);
    $this->repo->deleteById($blog);

    return redirect('/admin/blogs')->with('success', 'Blog deleted');
    }


    public function edit(Blog $blog)
    {
        return view(
            'admin.blogs.edit',
            [
                'blog' => $blog,
                'categories' => Category::all()
            ]
        );
    }


    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = Auth::id();

        if (request()->hasFile('thumbnail')) {

            $this->cloudinary->destroyByUrl($blog->thumbnail);
            $file = request()->file('thumbnail');
            $validatedData['thumbnail'] = $this->cloudinary->uploadFile($file, 'laravel-tech-blog/thumbnails');
        } else {
            $validatedData['thumbnail'] = $blog->thumbnail;
        }
        $this->repo->updateBlog($validatedData, $blog);
        return redirect('/admin/blogs')->with('success', 'Blog updated');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Repositories\BlogRepository;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    protected BlogRepository $repo;

    public function __construct(BlogRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $blogs = $this->repo->allBlogs(request(['search','category','username']), 6);
        return view('blogs.index', ['blogs' => $blogs]);
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog' => $blog,
            'randomBlogs' => $this->repo->random(3),
            'categories' => Category::all()
        ]);
    }

    public function subscriptionHandler(Blog $blog)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->isSubcribed($blog)) {
            $blog->unscribe();
        } else {
            $blog->subscribe();
        }

        return back();
    }
}

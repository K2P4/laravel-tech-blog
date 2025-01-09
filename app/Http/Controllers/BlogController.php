<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs.index', [
            'blogs' => Blog::latest()->filter(request(['search', 'category', 'username']))
                ->paginate(6)
                ->withQueryString()
        ]);
    }



    public function show(Blog $blog)
    {
        return view(
            'blogs.show',
            [
                'blog' => $blog,
                "randomBlogs" => Blog::inRandomOrder()->take(3)->get(),
                "categories" => Category::all()

            ]
        );
    }



    public function subscriptionHandler(Blog $blog)
    {


        if (auth()->user()->isSubcribed($blog)) {

            $blog->unscribe();
        } else {
            $blog->subscribe();
        }

        return back();
    }


}

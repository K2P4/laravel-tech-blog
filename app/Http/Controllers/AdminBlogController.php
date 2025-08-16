<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class AdminBlogController extends Controller
{

    public function create()
    {
        return view(
            'admin.view',
            [
                'categories' => Category::all()

            ],

        );
    }

    public function store()
    {


        $formData = request()->validate([
            "title" => ['required'],
            "body" => ['required'],
            "slug" => ['required', Rule::unique('blogs', 'slug')],
            "intro" => ['required'],
            "category_id" => ['required', Rule::exists('categories', 'id')]
        ]);

        $formData['user_id'] = auth()->id();
        if (request()->hasFile('thumbnail')) {
            $file = request()->file('thumbnail');
            $uploaded = Cloudinary::uploadApi()->upload(
                $file->getRealPath(),
                [
                    'folder' => 'laravel-tech-blog/thumbnails',
                    'verify' => false
                ]
            );
            $formData['thumbnail'] = $uploaded['secure_url'];
        } else {
            $formData['thumbnail'] = null;
        }

        Blog::create($formData);

        return redirect('/');
    }


    public function index()
    {
        return view(
            'admin.blogs.index',
            ['blogs' => Blog::latest()->paginate(4)]
        );
    }


    public function destory(Blog $blog)
    {
        $blog->delete();

        return back();
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


    public function update(Blog $blog)
    {
        $formData = request()->validate([
            "title" => ['required'],
            "body" => ['required'],
            "slug" => ['required', Rule::unique('blogs', 'slug')->ignore($blog)],
            "intro" => ['required'],
            "category_id" => ['required', Rule::exists('categories', 'id')]
        ]);
        $formData['user_id'] = auth()->id();

        if (request()->hasFile('thumbnail')) {

            $file = request()->file('thumbnail');
            $uploaded = Cloudinary::uploadApi()->upload(
                $file->getRealPath(),
                [
                    'folder' => 'laravel-tech-blog/thumbnails',
                    'verify' => false
                ]

            );

            $formData['thumbnail'] = $uploaded['secure_url'];
        } else {
            $formData['thumbnail'] = $blog->thumbnail;
        }
        $blog->update($formData);

        return redirect('/');
    }
}

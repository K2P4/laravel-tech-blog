<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class CommentController extends Controller
{


    public function store(Blog $blog)
    {
        request()->validate([
            'body' => ['required']

        ]);



        //commentstore
        $blog->comment()->create([
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);

        return redirect('/blogs/' . $blog->slug);
    }
}

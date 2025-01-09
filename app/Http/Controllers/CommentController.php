<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        //sendemail
        $filterSubcribe = $blog->subscribedUser->filter(fn($sub) => $sub->id != auth()->id());

        $filterSubcribe->each(function ($subcriber) use ($blog) {

            Mail::to($subcriber->email)->queue(new SubscriberMail($blog));
        });


        return redirect('/blogs/' . $blog->slug);
    }
}

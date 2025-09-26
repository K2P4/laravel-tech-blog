<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\StoreCommentRequest;
use App\Mail\SubscriberMail;
use App\Models\Blog;
use App\Repositories\CommentRepository;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    protected CommentRepository $repo;

    public function __construct(CommentRepository $repo)
    {
        $this->repo = $repo;
    }

    public function store(StoreCommentRequest $request, Blog $blog)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        $this->repo->createForBlog($blog, $data);

        // notify subscribers (excluding the commenter)
        $filterSubcribe = $blog->subscribedUser->filter(fn ($sub) => $sub->id != Auth::id());

        $filterSubcribe->each(function ($subcriber) use ($blog) {
            Mail::to($subcriber->email)->queue(new SubscriberMail($blog));
        });

        return redirect('/blogs/' . $blog->slug);
    }
}

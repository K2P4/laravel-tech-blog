<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        $totalSubscribers = $user->blogs->reduce(function ($carry, $blog) {
            return $carry + ($blog->subscribedUser ? $blog->subscribedUser->count() : 0);
        }, 0);

        return view('profile.index', ['user' => $user, 'totalSubscribers' => $totalSubscribers]);
    }
}

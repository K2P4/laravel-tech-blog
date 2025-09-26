<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    protected UserRepository $repo;

    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }


    public function index()
    {
        return view('admin.users.index', [
            'users' => $this->repo->allUsers()
        ]);
    }

    public function show(User $user)
    {
        $totalSubscribers = $user->blogs->reduce(function ($carry, $blog) {
            return $carry + ($blog->subscribedUser ? $blog->subscribedUser->count() : 0);
        }, 0);

        return view('admin.users.show', ['user' => $user, 'totalSubscribers' => $totalSubscribers]);
    }



    public function update(UpdateUserRequest $request, User $user)
    {
        $validatedData = $request->validated();
        $this->repo->updateUser($validatedData, $user);
        return redirect('/admin/users')->with('success', 'User updated');
    }
}

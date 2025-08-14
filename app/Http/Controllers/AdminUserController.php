<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::latest()->paginate(10)
        ]);
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'is_admin' => ['required', 'boolean']
        ]);

        $user->update($attributes);

        return back();
    }
}



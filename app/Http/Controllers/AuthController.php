<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected UserRepository $repo;

    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $validatedData = $request->validated();
        $user = $this->repo->createUser($validatedData);
        Auth::login($user);

        return redirect('/')->with('success', 'Welcome Dear ' . $user->name);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function post_login(LoginRequest $request)
    {

        $validatedData = $request->validated();

        if (Auth::attempt($validatedData)) {
            // Use the gate to check if the user is an admin
            if (Gate::allows('admin')) {
                return redirect('/admin/dashboard/index')->with('success', 'Welcome Back Admin ');
            }

            return redirect('/')->with('success', 'Welcome Back ');
        } else {
            return redirect()->back()->withErrors([
                'password' => 'your password is incorrect try again',
            ]);
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logout Successful');
    }
}

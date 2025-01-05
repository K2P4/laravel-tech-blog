<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $formData = request()->validate([
            "name" => 'required | max:255 | min:3 ',
            "username" => ['required', 'min:3', Rule::unique('users', 'username')],
            "password" => 'required | min:8',
            "email" => ['required', 'email', Rule::unique('users', 'email')],
        ]);


        $user = User::create($formData);
        //login
        auth()->login($user);

        return redirect('/')->with('success', 'Welcome Dear ' . $user->name);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function post_login()
    {
        $formData = request()->validate(
            [
                'email' => ['required', 'email', 'max:255', Rule::exists('users', 'email')],
                'password' => ['required', 'min:8', 'max:255']
            ],
            [
                'email.required' => "Please enter your email address",
                'password.required' => "Please enter your password",
                'passsword.min' => "Password should be more than 8",
            ]
        );

        // creditendial check password
        if (auth()->attempt($formData)) {
            return redirect('/')->with('success', 'Welcome Back ');
        } else {
            return redirect()->back()->withErrors([
                'password' => 'your password is incorrect try again',
            ]);
        }
    }


    public function logout()
    {
        //logout
        auth()->logout();
        return redirect('/')->with('success', 'Logout Successful');
    }
}

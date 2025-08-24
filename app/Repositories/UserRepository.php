<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    public function allUsers()
    {
        $query = User::query();
        return $query->latest()->paginate(6);
    }

    public function createUser(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'] ?? null,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function getById(User $user): User
    {
        return $user;
    }

    public function updateUser(array $data, User $user): User
    {
        $user->update($data);
        return $user;
    }

    public function loginUser(array $credentials): bool
    {
        return Auth::attempt($credentials);
    }
}

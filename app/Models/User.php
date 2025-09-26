<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'is_admin',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_admin' => 'boolean',
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }


    public function getNameAttribute($name)
    {
        return ucwords($name);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }


    public function subscribedBlogs()
    {
        return $this->belongsToMany(Blog::class);
    }

    public function isSubcribed($blog)
    {
        return auth()->user()->subscribedBlogs && auth()->user()->subscribedBlogs->contains('id', $blog->id);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model


{

    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'thumbnail',
        'slug',
        'intro',
        'body',
    ];

    /**
     * Casts for attributes.
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $with = ['author', 'category'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function comment()
    {
        return $this->hasMany(Comment::class);
    }


    public function subscribedUser()
    {
        return $this->belongsToMany(User::class);
    }

    public function subscribe()
    {
        $this->subscribedUser()->attach(auth()->id());
    }

    public function unscribe()
    {
        $this->subscribedUser()->detach(auth()->id());
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{

    public function index()
    {
        $data = [
            'blogsCount' => Blog::count(),
            'categoriesCount' => Category::count(),
            'usersCount' => User::count(),
            'recentBlogs' => Blog::latest()->take(5)->get(),
        ];

        return view('admin.dashboard.view', $data);
    }


}

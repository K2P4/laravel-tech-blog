<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//blogs
Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show'])->name('blogs.show');
Route::post('/blogs/{blog:slug}/comment', [CommentController::class, 'store'])->name('blogs.comment.store');
Route::post('/blogs/{blog:slug}/subscription', [BlogController::class, 'subscriptionHandler'])->name('blogs.subscription');
// subscribe info page
Route::view('/subscribe', 'subscribe')->name('subscribe');


//auth
Route::post('/register', [AuthController::class, 'store'])->middleware('guest')->name('register.store');
Route::get('/register', [AuthController::class, 'create'])->middleware('guest')->name('register.create');
Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login.create');
Route::post('/login', [AuthController::class, 'post_login'])->middleware('guest')->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');


//user
Route::get('/profile', [UserController::class, 'show'])->middleware('auth')->name('profile.show');

Route::middleware('can:admin')->group(function () {
    //dashboard
    Route::get('/admin/dashboard/index', [DashboardController::class, 'index'])->can('admin')->name('admin.dashboard.index');

    //blogs
    Route::get('/admin/blogs', [AdminBlogController::class, 'index'])->can('admin')->name('admin.blogs.index');
    Route::get('/admin/blogs/create', [AdminBlogController::class, 'create'])->can('admin')->name('admin.blogs.create');
    Route::post('/admin/blogs/create', [AdminBlogController::class, 'store'])->can('admin')->name('admin.blogs.store');
    Route::delete('/admin/blogs/{blog:slug}/delete', [AdminBlogController::class, 'destory'])->can('admin')->name('admin.blogs.destroy');
    Route::get('/admin/blogs/{blog:slug}/edit', [AdminBlogController::class, 'edit'])->can('admin')->name('admin.blogs.edit');
    Route::patch('/admin/blogs/{blog:slug}/update', [AdminBlogController::class, 'update'])->can('admin')->name('admin.blogs.update');

    // admin categories
    Route::get('/admin/categories', [AdminCategoryController::class, 'index'])->can('admin')->name('admin.categories.index');
    Route::post('/admin/categories', [AdminCategoryController::class, 'store'])->can('admin')->name('admin.categories.store');
    Route::get('/admin/categories/{category}/edit', [AdminCategoryController::class, 'edit'])->can('admin')->name('admin.categories.edit');
    Route::patch('/admin/categories/{category}', [AdminCategoryController::class, 'update'])->can('admin')->name('admin.categories.update');
    Route::delete('/admin/categories/{category}', [AdminCategoryController::class, 'destroy'])->can('admin')->name('admin.categories.destroy');

    // admin users
    Route::get('/admin/users', [AdminUserController::class, 'index'])->can('admin')->name('admin.users.index');
    Route::get('/admin/users/{user}', [AdminUserController::class, 'show'])->can('admin')->name('admin.users.show');
    Route::patch('/admin/users/{user}', [AdminUserController::class, 'update'])->can('admin')->name('admin.users.update');
});

// 404 fallback
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', [BlogController::class, 'index']);

Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);
Route::post('/blogs/{blog:slug}/comment', [CommentController::class, 'store']);
Route::get('/register', [AuthController::class, 'create'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
//auth
Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'post_login'])->middleware('guest');
Route::post('/blogs/{blog:slug}/subscription', [BlogController::class, 'subscriptionHandler']);

Route::middleware('can:admin')->group(function () {
    //dashboard
    Route::get('/admin/dashboard/index', [DashboardController::class, 'index'])->can('admin');

    //blogs
    Route::get('/admin/blogs', [AdminBlogController::class, 'index'])->can('admin');
    Route::get('/admin/blogs/create', [AdminBlogController::class, 'create'])->can('admin');
    Route::post('/admin/blogs/create', [AdminBlogController::class, 'store'])->can('admin');
    Route::delete('/admin/blogs/{blog:slug}/delete', [AdminBlogController::class, 'destory'])->can('admin');
    Route::get('/admin/blogs/{blog:slug}/edit', [AdminBlogController::class, 'edit'])->can('admin');
    Route::patch('/admin/blogs/{blog:slug}/update', [AdminBlogController::class, 'update'])->can('admin');

    // admin categories
    Route::get('/admin/categories', [AdminCategoryController::class, 'index'])->can('admin');
    Route::post('/admin/categories', [AdminCategoryController::class, 'store'])->can('admin');
    Route::get('/admin/categories/{category}/edit', [AdminCategoryController::class, 'edit'])->can('admin');
    Route::patch('/admin/categories/{category}', [AdminCategoryController::class, 'update'])->can('admin');
    Route::delete('/admin/categories/{category}', [AdminCategoryController::class, 'destroy'])->can('admin');

    // admin users
    Route::get('/admin/users', [AdminUserController::class, 'index'])->can('admin');
    Route::patch('/admin/users/{user}', [AdminUserController::class, 'update'])->can('admin');
});

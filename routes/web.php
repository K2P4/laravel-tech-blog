<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;


Route::get('/', [BlogController::class, 'index']);

Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);
Route::post('/blogs/{blog:slug}/comment', [CommentController::class, 'store']);
Route::get('/register', [AuthController::class, 'create'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'post_login'])->middleware('guest');
Route::post('/blogs/{blog:slug}/subscription', [BlogController::class, 'subscriptionHandler']);

Route::middleware('can:admin')->group(function () {
    Route::get('/admin/blog/create', [AdminBlogController::class, 'create'])->can('admin');
    Route::post('/admin/blog/create', [AdminBlogController::class, 'store'])->can('admin');
    Route::get('/admin/blog', [AdminBlogController::class, 'index'])->can('admin');
    Route::delete('/admin/{blog:slug}/delete', [AdminBlogController::class, 'destory'])->can('admin');
    Route::get('/admin/{blog:slug}/edit', [AdminBlogController::class, 'edit'])->can('admin');
    Route::patch('/admin/{blog:slug}/update', [AdminBlogController::class, 'update'])->can('admin');
});

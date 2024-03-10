<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;


Route::get('/', [HomeController::class, 'index']);

Route::get('/all-blog/', [BlogController::class, 'index'])->name('blog.list');

// Hiển thị form tạo bài viết mới
Route::get('/create-blog/', [BlogController::class, 'create'])->name('blog.create');

// Route hiển thị form sửa bài viết
Route::get('/blog/read/id-blog={blog}/edit', [BlogController::class, 'edit'])->name('blog.edit');

// Route cập nhật bài viết
Route::put('/blog/{blog}', [BlogController::class, 'update'])->name('blog.update');

// Lưu bài viết mới
Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');

// Hiển thị bài viết
Route::get('/blog/read/id-blog={blog}/', [BlogController::class, 'show'])->name('blog.read');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\PostController;
use App\Http\Controllers\Back\CommentController;
 
Route::get('/', 'DashboardController')->name('dashboard');
Route::resource('posts', PostController::class);

// Route::get('posts/{id}/comments/create', [CommentController::class, 'create'])->name('comments.create');
// Route::post('posts/{id}/comments/', [CommentController::class, 'store'])->name('comments.store');
// // Route::get('posts/{id}/edit', [CommentController::class, 'edit'])->name('comments.edit');
// // Route::get('posts/{id}/destroy', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::resource('posts/{id}/comments', CommentController::class)->except(['index', 'show']);

Route::resource('tags', TagController::class)->except('show');
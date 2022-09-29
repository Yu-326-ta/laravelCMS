<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\PostController;
use App\Http\Controllers\Back\CommentController;
 
Route::get('/', 'DashboardController')->name('dashboard');
Route::resource('posts', PostController::class);

Route::resource('posts/{id}/comments', CommentController::class)->except(['index', 'show']);

Route::resource('tags', TagController::class)->except('show');
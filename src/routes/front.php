<?php

use App\Http\Controllers\Front\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::get('posts/tag/{tagSlug}', [PostController::class, 'index'])->where('tagSlug', '[a-z]+')->name('posts.index.tag');

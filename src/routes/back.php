<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\PostController;
 
Route::get('/', 'DashboardController')->name('dashboard');
Route::resource('posts', PostController::class);

Route::resource('tags', TagController::class)->except('show');
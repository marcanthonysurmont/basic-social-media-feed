<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', function (){
    return redirect('/');
});

Route::get('/status/{id}', [PostController::class, 'status'])->name('status')->where('id', '[0-9]+');

Route::middleware('auth')->group(function () {
    Route::get('/create-post', [PostController::class, 'create_post'])->name('create-post');
    Route::post('/create-post', [PostController::class, 'store'])->name('create-post.store');

    Route::get('/edit-post/{id}', [PostController::class, 'edit_post'])->name('edit-post');
    Route::post('/edit-post/{id}', [PostController::class, 'update'])->name('edit-post.update');
    Route::delete('/edit-post/{id}', [PostController::class, 'delete'])->name('edit-post.delete');

    Route::post('/', [PostController::class, 'like'])->name('home.like');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

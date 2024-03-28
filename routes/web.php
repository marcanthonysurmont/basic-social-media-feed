<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', function (){
    return redirect('/');
});

Route::get('/status/{id}', [PostController::class, 'status'])->name('status')->where('id', '[0-9]+');

Route::post('/create-post', [PostController::class, 'store'])->name('create-post.store');

Route::get('/my-posts', [PostController::class, 'getUserPosts'])->name('my-posts');
Route::get('/my-posts/recently-deleted', [PostController::class, 'recently_deleted'])->name('recently-deleted');
Route::get('/my-posts/recently-deleted/{id}', [PostController::class, 'restore'])->name('recently-deleted.restore')->where('id', '[0-9]+');

Route::post('/edit-post/{id}', [PostController::class, 'update'])->name('edit-post.update')->where('id', '[0-9]+');
Route::delete('/edit-post/{id}', [PostController::class, 'delete'])->name('edit-post.delete')->where('id', '[0-9]+');

Route::post('/', [PostController::class, 'like'])->name('home.like');

Route::post('/status/{id}', [CommentController::class, 'add'])->name('status.comment')->where('id', '[0-9]+');
Route::delete('/status/{id}', [CommentController::class, 'delete'])->name('status.delete')->where('id', '[0-9]+');

Route::middleware('auth')->group(function () {
    Route::get('/create-post', [PostController::class, 'create_post'])->name('create-post');
    Route::get('/edit-post/{id}', [PostController::class, 'edit'])->name('edit-post')->where('id', '[0-9]+');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

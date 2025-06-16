<?php

use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/update/{post}', [PostController::class, 'update'])->name('post.update');
    Route::get('/{post}', [PostController::class, 'show'])->name('post.show');
});

Route::prefix('tags')->group(function () {
    Route::get('/', [TagController::class, 'index'])->name('tags.index');
    Route::get('/create', [TagController::class, 'create'])->name('tags.create');
    Route::post('/store', [TagController::class, 'store'])->name('tags.store');
    Route::get('/edit/{tag}', [TagController::class, 'edit'])->name('tags.edit');
    Route::put('/update/{tag}', [TagController::class, 'update'])->name('tags.update');
    Route::delete('/delete/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');
});

Route::get('/posts/tag/{tag:slug}', [PostController::class, 'filterByTag'])->name('posts.filterByTag');

<?php

use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\TagController;
use App\Http\Controllers\Frontend\PageController;
use Illuminate\Support\Facades\Route;


Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('/edit/{slug}', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/update/{slug}', [PostController::class, 'update'])->name('post.update');
    Route::get('/{slug}', [PostController::class, 'show'])->name('post.show');
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

Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/about', [PageController::class, 'about'])->name('about');

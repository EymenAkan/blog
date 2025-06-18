<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Frontend\TagController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Auth\ResetPasswordController;


Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/auth/{provider}', [SocialiteController::class, 'redirect'])->name('socialite.redirect');
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback'])->name('socialite.callback');


Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

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

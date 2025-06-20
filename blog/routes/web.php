<?php

use App\Http\Controllers\Backend\Admin\AdminPostController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Profile\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\TagController;
use Illuminate\Support\Facades\Route;

// Herkese açık rotalar
Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/about', [PageController::class, 'about'])->name('about');

Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/{slug}', [PostController::class, 'show'])->name('posts.show');
});

Route::get('tags/', [TagController::class, 'index'])->name('tags.index');

Route::prefix('tags')->middleware('role:admin')->group(function () {
    Route::get('/create', [TagController::class, 'create'])->name('tags.create');
    Route::post('/', [TagController::class, 'store'])->name('tags.store');
    Route::get('/{tag}/edit', [TagController::class, 'edit'])->name('tags.edit');
    Route::put('/{tag}', [TagController::class, 'update'])->name('tags.update');
    Route::delete('/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');
});
Route::get('/posts/tag/{tag:slug}', [PostController::class, 'filterByTag'])->name('posts.filterByTag');

// Misafir rotaları
Route::middleware('guest')->group(function () {
    Route::get('/password/reset', [PasswordResetController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [PasswordResetController::class, 'reset'])->name('password.update');

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/auth/{provider}', [SocialiteController::class, 'redirect'])->name('socialite.redirect');
    Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback'])->name('socialite.callback');
});

// Oturum açmış kullanıcı rotaları
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/posts', [DashboardController::class, 'postsIndex'])->name('backend.posts.index');
    Route::get('/tags', [DashboardController::class, 'tagsIndex'])->name('backend.tags.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

    // Kullanıcı post rotaları
    Route::prefix('posts')->group(function () {
        Route::get('/create', [PostController::class, 'create'])->name('user.posts.create');
        Route::post('/', [PostController::class, 'store'])->name('user.posts.store');
        Route::get('/{slug}/edit', [PostController::class, 'edit'])->name('user.posts.edit');
        Route::put('/{slug}', [PostController::class, 'update'])->name('user.posts.update');
        Route::delete('/{slug}', [PostController::class, 'destroy'])->name('user.posts.destroy');
    });

    // Admin rotaları
    Route::prefix('admin')->middleware('role:admin')->group(function () {
        Route::prefix('posts')->group(function () {
            Route::get('/', [AdminPostController::class, 'index'])->name('admin.posts.index');
            Route::get('/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
            Route::post('/', [AdminPostController::class, 'store'])->name('admin.posts.store');
            Route::get('/{post}', [AdminPostController::class, 'show'])->name('admin.posts.show');
            Route::get('/{post}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
            Route::put('/{post}', [AdminPostController::class, 'update'])->name('admin.posts.update');
            Route::delete('/{post}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');
        });
    });
});

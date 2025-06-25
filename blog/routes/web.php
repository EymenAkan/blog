<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\PostController as FrontPostController;
use App\Http\Controllers\Frontend\TagController as FrontTagController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Auth\PasswordResetController;

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Admin\UserController;
use App\Http\Controllers\Backend\Profile\ProfileController;
use App\Http\Controllers\Backend\Comment\CommentController;
use App\Http\Controllers\Backend\Tag\TagController as BackTagController;
use App\Http\Controllers\Backend\Post\PostController as BackPostController;
use App\Http\Controllers\Backend\Category\CategoryController as BackCategoryController;



    Route::get('/', [PageController::class, 'index'])->name('index');
    Route::get('/about', [PageController::class, 'about'])->name('about');

    Route::prefix('blog')->group(function () {
        Route::get('/', [FrontPostController::class, 'index'])->name('blog.index');
        Route::get('/{slug}', [FrontPostController::class, 'show'])->name('blog.show');
    });

    Route::get('tags/', [FrontTagController::class, 'index'])->name('filter.index');
    Route::get('/blog/tag/{tag:slug}', [FrontPostController::class, 'filterByTag'])->name('blog.filterByTag');

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

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

    Route::prefix('posts')->group(function () {
        Route::get('/', [BackPostController::class, 'index'])->name('posts.index');
        Route::get('/create', [BackPostController::class, 'create'])->name('posts.create');
        Route::post('/', [BackPostController::class, 'store'])->name('posts.store');
        Route::get('/{post}/edit', [BackPostController::class, 'edit'])->name('posts.edit');
        Route::put('/{post}', [BackPostController::class, 'update'])->name('posts.update');
        Route::delete('/{post}', [BackPostController::class, 'destroy'])->name('posts.destroy');
        Route::post('/posts/{post}/comment', [FrontPostController::class, 'CommentStore'])->name('posts.comment.store');
    });

    Route::get('tags/backend', [BackTagController::class, 'index'])->name('tags.index');
    Route::prefix('tags')->middleware('role:author,editor,admin')->group(function () {
        Route::get('/create', [BackTagController::class, 'create'])->name('tags.create');
        Route::post('/', [BackTagController::class, 'store'])->name('tags.store');
        Route::get('/{tag}/edit', [BackTagController::class, 'edit'])->name('tags.edit');
        Route::put('/{tag}', [BackTagController::class, 'update'])->name('tags.update');
        Route::delete('/{tag}', [BackTagController::class, 'destroy'])->name('tags.destroy');
    });

    Route::get('/categories', [BackCategoryController::class, 'index'])->name('backend.categories.index');
    Route::prefix('categories')->middleware('role:editor,admin')->group(function () {
        Route::get('/create', [BackCategoryController::class, 'create'])->name('backend.categories.create');
        Route::post('/', [BackCategoryController::class, 'store'])->name('backend.categories.store');
        Route::get('/{category}/edit', [BackCategoryController::class, 'edit'])->name('backend.categories.edit');
        Route::put('/{category}', [BackCategoryController::class, 'update'])->name('backend.categories.update');
        Route::delete('/{category}', [BackCategoryController::class, 'destroy'])->name('backend.categories.destroy');
    });

    Route::prefix('users')->middleware('role:admin')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/', [UserController::class, 'store'])->name('users.store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    Route::prefix('comments')->group(function () {
        Route::get('/', [App\Http\Controllers\Backend\Comment\CommentController::class, 'index'])->name('comments.index');
        Route::get('/create', [App\Http\Controllers\Backend\Comment\CommentController::class, 'create'])->name('comments.create');
        Route::post('/', [App\Http\Controllers\Backend\Comment\CommentController::class, 'store'])->name('comments.store');
        Route::get('/{comment}/edit', [App\Http\Controllers\Backend\Comment\CommentController::class, 'edit'])->name('comments.edit');
        Route::put('/{comment}', [App\Http\Controllers\Backend\Comment\CommentController::class, 'update'])->name('comments.update');
        Route::delete('/{comment}', [App\Http\Controllers\Backend\Comment\CommentController::class, 'destroy'])->name('comments.destroy');
    });
});




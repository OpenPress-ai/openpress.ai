<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ContentBlockController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::get('/dashboard', [SiteController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/sites', [SiteController::class, 'store'])->name('sites.store');
    Route::get('/sites/create', [SiteController::class, 'create'])->name('sites.create');
});

Route::middleware(['auth', 'editor'])->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::post('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// New route for ContentBlockController demo
Route::get('/demo', [ContentBlockController::class, 'demo'])->name('content-blocks.demo');

require __DIR__ . '/auth.php';

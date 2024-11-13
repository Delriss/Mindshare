<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

//Home Page
Route::get('/', [SiteController::class, 'index'])->name('home');

// Profile routes with auth middleware
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // Show the profile edit form
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Update the profile
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Delete the profile
});

// Blog routes with auth middleware
Route::controller(BlogController::class) -> middleware(['auth', 'verified']) -> group(function () {
    Route::get('/dashboard', [BlogController::class, 'index'])->name('dashboard'); // Show the dashboard
    Route::get('/dashboard/{slug}', [BlogController::class, 'show'])->name('blog.show'); // Show a single blog post
    Route::post('/dashboard', [BlogController::class, 'store'])->name('blog.store'); // Save a new blog post
    Route::put('/dashboard/{slug}', [BlogController::class, 'update'])->name('blog.update'); // Update a blog post
    Route::delete('/dashboard/{slug}', [BlogController::class, 'destroy'])->name('blog.destroy'); // Delete a blog post
    Route::get('/blog/search', [BlogController::class, 'search'])->name('blog.search'); // Search for blog posts
});

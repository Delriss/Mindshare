<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', [SiteController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(BlogController::class) -> middleware(['auth', 'verified']) -> group(function () {
    Route::get('/dashboard', [BlogController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/{slug}', [BlogController::class, 'show'])->name('blog.show');
    Route::post('/dashboard', [BlogController::class, 'store'])->name('blog.store');
    Route::put('/dashboard/{slug}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/dashboard/{slug}', [BlogController::class, 'destroy'])->name('blog.destroy');
    Route::get('/blog/search', [BlogController::class, 'search'])->name('blog.search');
});

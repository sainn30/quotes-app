<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserQuoteController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminQuoteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes untuk User biasa (role = user)
Route::middleware(['auth', 'usermiddleware'])->group(function () {
    // Dashboard user
    Route::get('/dashboard', [UserQuoteController::class, 'index'])->name('dashboard');

    // Quotes User
    Route::get('/quotes', [UserQuoteController::class, 'index'])->name('quotes.index');
    Route::get('/quotes/create', [UserQuoteController::class, 'create'])->name('quotes.create');
    Route::post('/quotes', [UserQuoteController::class, 'store'])->name('quotes.store');
    Route::get('/quotes/{id}/edit', [UserQuoteController::class, 'edit'])->name('quotes.edit');
    Route::put('/quotes/{id}', [UserQuoteController::class, 'update'])->name('quotes.update');
    Route::get('/quotes/mine', [UserQuoteController::class, 'mine'])->name('quotes.mine');
    Route::delete('/quotes/{id}', [UserQuoteController::class, 'destroy'])->name('quotes.destroy');

    // Like/Unlike Quotes
    Route::post('/quotes/{id}/like', [LikeController::class, 'like'])->name('quotes.like');
    Route::delete('/quotes/{id}/unlike', [LikeController::class, 'unlike'])->name('quotes.unlike');
});

// Routes untuk Admin (role = admin)
Route::middleware(['auth', 'adminmiddleware'])->group(function () {
    // Admin dashboard
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');  

    // Manajemen Quotes (lihat & hapus)
    Route::get('/admin/quotes', [AdminQuoteController::class, 'index'])->name('admin.quotes.index');
    Route::delete('/admin/quotes/{id}', [AdminQuoteController::class, 'destroy'])->name('admin.quotes.destroy');

    // Manajemen User
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');

    // Statistik admin
    Route::get('/admin/stats', [AdminController::class, 'stats'])->name('admin.stats');
});

require __DIR__.'/auth.php';

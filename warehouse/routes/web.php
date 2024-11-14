<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/create', [ProductController::class, 'createIndex'])->name('create');
    Route::post('/create', [ProductController::class, 'store'])->name('product.store');

    Route::get('/', [IndexController::class, 'index'])->name('index');
});

require __DIR__.'/auth.php';

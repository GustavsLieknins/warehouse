<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;
use App\Http\Controllers\Admin\AdminDashboardController;


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


    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/lowStock', [ProductController::class, 'lowStock'])->name('lowStock');
    Route::get('/ordered', [ProductController::class, 'ordered'])->name('ordered');

    Route::get('/products/filter', [ProductController::class, 'indexFilter'])->name('products');

});
Route::middleware(['auth', 'Admin'])->group(function () {
    Route::get('/create', [IndexController::class, 'showCreate'])->name('showCreate');

    Route::get('/edit', [IndexController::class, 'showEdit'])->name('showEdit');

    Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

});

require __DIR__.'/auth.php';

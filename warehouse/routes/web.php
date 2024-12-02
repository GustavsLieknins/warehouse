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

    // Route::get('/create', [ProductController::class, 'createIndex'])->name('create');
    Route::post('/create', [ProductController::class, 'store'])->name('product.store');

    Route::get('/', [IndexController::class, 'index'])->name('index');


    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/lowStock', [ProductController::class, 'lowStock'])->name('lowStock');
    Route::get('/ordered', [ProductController::class, 'ordered'])->name('ordered');

    Route::get('/products/filter', [ProductController::class, 'indexFilter'])->name('products');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/order', [ProductController::class, 'order'])->name('order');

    Route::post('/products/{id}/order', [ProductController::class, 'addOrder'])->name('products.order.form');

});
Route::middleware(['auth', 'Admin'])->group(function () {
    Route::get('/create', [ProductController::class, 'createIndex'])->name('showCreate');

    Route::get('/edit', [ProductController::class, 'edit'])->name('products.edit');

    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');


    Route::get('/delete', [ProductController::class, 'destroy'])->name('delete');

    Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

                Route::get('admin/actions', function () {
                    $actions = \App\Models\Actions::orderBy('created_at', 'desc')->get();

                    return view('actions', compact('actions'));
                })->name('admin.actions');

    Route::post('/products/{id}/delivered', [ProductController::class, 'delivered'])->name('products.delivered');
    
});


require __DIR__.'/auth.php';

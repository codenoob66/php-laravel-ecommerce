<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::get('/checkout', [CheckOutController::class, 'index'])->name('checkout.index');
});

Route::get('/products', [ProductController::class, 'index'])->name('product.index');


Route::get('/products/{product}', [ProductController::class, 'show'])->name('product.show');
Route::post('/cart/add', [CartController::class,'store'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/checkout', [CheckOutController::class, 'index'])->name('checkout.index');


require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     $products = Product::all();
//     return view('dashboard', compact('products'));
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/admin/dashboard/products', ProductController::class);  // Menambahkan resource untuk ProductController
Route::resource('cart', CartController::class);

require __DIR__.'/auth.php';

// User route
Route::middleware(['auth', 'UserMiddleware'])->group(function(){
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
});

// Admin route
Route::middleware(['auth', 'AdminMiddleware'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

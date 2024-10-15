<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $products = Product::all();
    $isLoggedIn = Auth::check();
    return view('dashboard', compact('products', 'isLoggedIn'));
})->name('dashboards');

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
// Route::resource('cart', CartController::class);
Route::get('cart', [ProductController::class, 'productCart'])->name('productCart');

// Route::get('/movies-list', [MovieController::class, 'index']);  
Route::get('/product-list', [ProductController::class, 'index']);  
// Route::get('/cart-list', [MovieController::class, 'productCart']);
Route::get('/cart-list-product', [ProductController::class, 'productCart']);
// Route::post('add-to-cart', [MovieController::class, 'addMovieToCart'])->name('add-movie-to-shopping-cart');
Route::post('add-to-cart-product', [ProductController::class, 'addProductToCart'])->name('add-to-cart');
// Route::delete('/delete-cart-item', [MovieController::class, 'deleteItem'])->name('delete.cart.item');
Route::post('checkout', [ProductController::class, 'checkout'])->name('checkout');
Route::get('/invoice', [ProductController::class, 'invoice'])->name('invoice');
Route::post('/cart/delete', [ProductController::class, 'deleteCart'])->name('deleteCart');
Route::get('dashboard', [ProductController::class, 'getCartQuantity'])->name('cartQuantity');
Route::get('admin/dashboard/log', [ProductController::class, 'logTransaction'])->name('logTransaction');

Route::get('/invoice/{id}/download', [ProductController::class, 'download'])->name('checkout.invoice.download');

require __DIR__.'/auth.php';

// User route
Route::middleware(['auth', 'UserMiddleware'])->group(function(){
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
});

// Admin route
Route::middleware(['auth', 'AdminMiddleware'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction');
Route::post('/update-order/{id}', [TransactionController::class, 'updateOrder'])->name('update.order');
Route::post('/transaction/update-status/{id}', [TransactionController::class, 'updateStatus'])->name('transaction.updateStatus');
Route::post('/upload-receipt/{id}', [TransactionController::class, 'uploadReceipt']);
Route::post('/update-order-status/{id}', [TransactionController::class, 'completedStatus']);
Route::get('/admin/dashboard/all-users', [TransactionController::class, 'getAllUsers'])->name('getAllUsers');
Route::post('/update-status/{id}', [TransactionController::class, 'updateStatus'])->name('update.status');
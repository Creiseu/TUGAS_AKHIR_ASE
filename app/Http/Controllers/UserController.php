<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
{
    $products = Product::all();
    $isLoggedIn = Auth::check();
    
    // Mengirimkan data ke view menggunakan compact
    return view('dashboard', compact('products', 'isLoggedIn'));
}

}

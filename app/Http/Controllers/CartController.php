<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $cartItems = Cart::with('products')->where('created_by', auth()->id())->get();
        return view('cart/index', compact('cartItems'));
    }
}

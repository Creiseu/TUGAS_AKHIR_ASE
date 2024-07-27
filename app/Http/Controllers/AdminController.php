<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        // $product = Product::all();
        $product = Product::with('creator')->get();
        return view('admin.dashboard', compact('product'));
    }

    public function admin(){
        return view('auth.admin');
    }
}

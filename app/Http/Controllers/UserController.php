<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Product;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->user_type == 'user') {
            return view('dashboard');
        } else if (Auth::check() && Auth::user()->user_type == 'admin') {
            return view('admin.dashboard');
        }
    }
    public function home()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }
}

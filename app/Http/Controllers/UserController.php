<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductCard;

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
        $products = Product::latest()->take(4)->get();
        return view('index', compact('products'));
    }
    public function productDetails($id)
    {
        $product = Product::findOrFail($id);
        return view('product_details', compact('product'));
    }
    public function viewAllProducts()
    {
        $products = Product::all();
        return view('allproducts', compact('products'));
    }
    public function addToCard($id)
    {
        $product = Product::findOrFail($id);
        $product_cart = new ProductCard();
        $product_cart->user_id = Auth::id();
        $product_cart->product_id = $product->id;

        $product_cart->save();
        return redirect()->back()->with('cart_message', 'added to the card');
    }
}

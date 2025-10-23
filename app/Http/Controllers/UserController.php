<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductCart;
use App\Models\Order;

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
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
        } else {
            $count = '';
        }
        $products = Product::latest()->take(4)->get();
        return view('index', compact('products', 'count'));
    }
    public function productDetails($id)
    {
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
        } else {
            $count = '';
        }
        $product = Product::findOrFail($id);
        return view('product_details', compact('product', 'count'));
    }
    public function viewAllProducts()
    {
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
        } else {
            $count = '';
        }
        $products = Product::all();
        return view('allproducts', compact('products', 'count'));
    }
    public function addToCard($id)
    {
        $product = Product::findOrFail($id);
        $product_cart = new ProductCart();
        $product_cart->user_id = Auth::id();
        $product_cart->product_id = $product->id;

        $product_cart->save();
        return redirect()->back()->with('cart_message', 'added to the card');
    }
    public function cardProducts()
    {
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
            $cart = ProductCart::where('user_id', Auth::id())->get();
        } else {
            $count = '';
        }
        return view('viewcartproducts', compact('count', 'cart'));
    }
    public function removeCartProduct($id)
    {
        $cart_product = ProductCart::findOrFail($id);
        $cart_product->delete();
        return redirect()->back();
    }
    public function confirmOrder(Request $request)
    {
        $cart_product_ids = ProductCart::where('user_id', Auth::id())->get();
        $address = $request->receiver_address;
        $phone = $request->receiver_phone;

        foreach ($cart_product_ids as $cart_product_id) {
            $order = new Order();
            $order->receiver_address = $address;
            $order->receiver_phone = $phone;
            $order->user_id = Auth::id();
            $order->product_id = $cart_product_id->product_id;
            $order->save();
        }

        $carts = ProductCart::where('user_id', Auth::id())->get();
        foreach ($carts as $cart) {
            $cart_id = ProductCart::find($cart->id);
            $cart_id->delete();
        }
        return redirect()->back()->with('confirm_order', 'Order confirmed!');
    }
    public function myOrders()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('viewmyorders', compact('orders'));
    }
}

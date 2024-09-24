<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
class FrontendpageController extends Controller
{
    // This method will return the homepage view
    public function index()
    {
        $category = Category::all();
        $cartItems = Cart::with('product') // assuming you have a relationship between Cart and Product models
        ->where('user_id', auth()->id())
        ->get();

        $totalAmount = $cartItems->sum(function ($item) {
        return $item->quantity * $item->product->selling_price;
        });
        
        return view('frontend.homepage', compact('category','cartItems', 'totalAmount'));
    }


    public function productList($categoryId)
    {
        $category = Category::all();
        $products = Product::with('category')->where('category_id', $categoryId)->get();
        $hide= true;           
        // Cart details
        $cartItems = Cart::with('product') // assuming you have a relationship between Cart and Product models
        ->where('user_id', auth()->id())
        ->get();

        $totalAmount = $cartItems->sum(function ($item) {
        return $item->quantity * $item->product->selling_price;
        });

        return view('frontend.productlist', compact('products','category','hide','cartItems', 'totalAmount'));
    }
    
    public function productDetails($productId)
    {       
        $category = Category::all();
        $products = Product::with('category')->where('id', $productId)->first();
        $hide= true;  
        // Cart details
        $cartItems = Cart::with('product') // assuming you have a relationship between Cart and Product models
        ->where('user_id', auth()->id())
        ->get();

        $totalAmount = $cartItems->sum(function ($item) {
        return $item->quantity * $item->product->selling_price;
        });
        return view('frontend.productDetails', compact('products','category','hide','cartItems', 'totalAmount'));
    }

    

}

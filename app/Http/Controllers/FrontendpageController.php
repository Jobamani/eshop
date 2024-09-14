<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class FrontendpageController extends Controller
{
    // This method will return the homepage view
    public function index()
    {
        $category = Category::all();
    
        return view('frontend.homepage', compact('category'));
    }


    public function productList($categoryId)
    {
        $category = Category::all();
        $products = Product::with('category')->where('category_id', $categoryId)->get();
        $hide= true;           
        return view('frontend.productlist', compact('products','category','hide'));
    }
    
    public function productDetails($productId)
    {       
        $category = Category::all();
        $products = Product::with('category')->where('id', $productId)->first();
        $hide= true;  
        return view('frontend.productDetails', compact('products','category','hide'));
    }

    

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get(); // Fetch all products from the database  
        return view('admin.products.index', compact('products')); // Pass the data to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all(); // Fetch all products from the database
        return view('admin.products.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
       // Validate the request data 
       $request->validate([
        'name' => 'required|string|max:25|not_regex:/^\d+$/||unique:categories,name',
        'description' => 'nullable|string|not_regex:/^\d+$/',
        'category'=>'required|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'mrp_price'=>'Numeric|required',
        'selling_price'=>'Numeric|required',

    ], 
      [
        'name.required' => 'Product name field must be filled',        
        'name.not_regex' => 'Product name cant be number',
        'description.not_regex'=>'Product description cant be number',
        'name.unique' => 'Product name is already exist',
        'image.image'=>'The file must be an image',
        'image.mimes'=>'The image must be a file of type: jpeg, png, jpg, gif, svg',
        'image.max'=>'The image may not be greater than 2048 kilobytes',

      ]);    

      $product = new Product();
      $product->name = $request->name;
      $product->description = $request->description; 
      $product->category_id = $request->category;
      $product->mrp_price = $request->mrp_price;
      $product->selling_price = $request->selling_price; 


    // Product::create($request->all());
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $product->image = $imagePath;
    }
    $product->save();

    return redirect()->route('products.index')->with('success', 'Product Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('products.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource
     */
    public function edit(string $id)
    {
        
        $products = Product::find($id);
        $category = Category::all(); // Fetch all products from the database
        return view('admin.products.edit', compact('products','category'));
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:25|not_regex:/^\d+$/||unique:categories,name',
            'description' => 'nullable|string|not_regex:/^\d+$/',
            'category'=>'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mrp_price'=>'Numeric|required',
            'selling_price'=>'Numeric|required',

        ], 
          [
            'name.required' => 'Product name field must be filled',        
            'name.not_regex' => 'Product name cant be number',
            'description.not_regex'=>'Product description cant be number',
            'image.image'=>'The file must be an image',
            'image.mimes'=>'The image must be a file of type: jpeg, png, jpg, gif, svg',
            'image.max'=>'The image may not be greater than 2048 kilobytes',

          ]);


        // Find the product by ID
        $Product = Product::find($id);      
            

        if ($Product) {
            // Update the product with validated data
            $Product->name = $request->name;
            $Product->description = $request->description;
            $Product->category_id = $request->category;
            $Product->mrp_price = $request->mrp_price;
            $Product->selling_price = $request->selling_price;   
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                $Product->image = $imagePath;
            }
            $Product->save();

            // Redirect with success message
            return redirect()->route('products.index')->with('success', 'Product updated successfully');
        } else {
            // Redirect with error message if category not found
            return redirect()->route('products.index')->with('error', 'Product not found');
        }
    }


    

    public function men()
    {
        // Your logic here, for example:
        $products = Product::with('category')->where('category_id',12)->get(); // Fetch all products from the database  
        
        return view('admin.products.men', compact('products'));
    }

    // Method for 'women' category (newly added)
    public function women()
    {
        $products = Product::with('category')->where('category_id',2)->get(); // Fetch all products from the database  
        
        return view('admin.products.women', compact('products'));
    } 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        
        $product = Product::findOrFail($id);
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
       
        if ($product) {
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Product deleted successfully');
        } else {
            return redirect()->route('products.index')->with('error', 'Product not found');
        }
       
    }
}    


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
    
        $categories = Category::all();
        // dd($categories);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {        
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:15|not_regex:/^\d+$/||unique:categories,name',
            'description' => 'nullable|string|not_regex:/^\d+$/',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], 
          [
            'name.required' => 'Category name field must be filled',        
            'name.not_regex' => 'Category name cant be number',
            'description.not_regex'=>'Category description cant be number',
            'name.unique' => 'Category name is already exist',
            'image.image'=>'The file must be an image',
            'image.mimes'=>'The image must be a file of type: jpeg, png, jpg, gif, svg',
            'image.max'=>'The image may not be greater than 2048 kilobytes',

          ]);    

          $category = new Category();
          $category->name = $request->name;
          $category->description = $request->description;        
        // Category::create($request->all());
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $category->image = $imagePath;
        }
        $category->save();

        return redirect()->route('managecategory')->with('success', 'Category Added successfully');
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit($id)
    {
        $categories = Category::find($id);
        return view('admin.categories.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:15|not_regex:/^\d+$/',
            'description' => 'nullable|string|not_regex:/^\d+$/',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], 
          [
            'name.required' => 'Category name field must be filled',        
            'name.not_regex' => 'Category name cant be number',
            'description.not_regex'=>'Category description cant be number',
            'image.image'=>'The file must be an image',
            'image.mimes'=>'The image must be a file of type: jpeg, png, jpg, gif, svg',
            'image.max'=>'The image may not be greater than 2048 kilobytes',

          ]);


        // Find the category by ID
        $category = Category::find($id);

        if ($category) {
            // Update the category with validated data
            $category->name = $request->name;
            $category->description = $request->description;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                $category->image = $imagePath;
            }
            $category->save();

            // Redirect with success message
            return redirect()->route('managecategory')->with('success', 'Category updated successfully');
        } else {
            // Redirect with error message if category not found
            return redirect()->route('managecategory')->with('error', 'Category not found');
        }
    }
    

    public function destroy($id, Category $category)
    {
        $category = Category::findOrFail($id);
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();

        return redirect()->route('managecategory')
                         ->with('success', 'Category deleted successfully.');
    }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    public function index()
    {
       
        $customers= User::all();    
        // dd($customers);    
        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        // dd('hello');
        $request->validate([
            'name' => 'required|string|max:15|not_regex:/^\d+$/|',
            'email'=>'required|email|unique:users,email',
            'phone_no'=>'required|numeric',
            'gender'=> 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password'=>'min:8|required|max:15',
        ], 
          [
            'name.required' => 'Customer name field must be filled',        
            'name.not_regex' => 'Customer name cant be number',           
            'name.unique' => 'Customer name is already exist',
            'image.image'=>'The file must be an image',
            'image.mimes'=>'The image must be a file of type: jpeg, png, jpg, gif, svg',
            'image.max'=>'The image may not be greater than 2048 kilobytes',

          ]);    

          $Customer = new User();
          $Customer->name = $request->name;
          $Customer->email = $request->email;   
          $Customer->password = $request->password;  
          $Customer->phone_no = $request->phone_no;  
          $Customer->gender = $request->gender;  
             
        // Customer::create($request->all());
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $Customer->image = $imagePath;
        }
        $Customer->save();

        return redirect()->route('customers.index')->with('success', 'Customer Added successfully');
    }

    

    public function edit($id)
    {

        $Customers = User::find($id);
        return view('admin.customers.edit', compact('Customers'));
    }

    public function update(Request $request, $id)
    {
        // dd("ss");
        // Update a customer
        $request->validate([
            'name' => 'required|string|max:20|not_regex:/^\d+$/|',
            'email'=>'required|unique',
            'phone_no'=>'required|numeric',
            'gender'=> 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
            
        ], 
          [
            'name.required' => 'Customer name field must be filled',        
            'name.not_regex' => 'Customer name cant be number',     
            'image.image'=>'The file must be an image',
            'image.mimes'=>'The image must be a file of type: jpeg, png, jpg, gif, svg',
            'image.max'=>'The image may not be greater than 2048 kilobytes',

          ]);
        // Find the customer by ID  

        $customer = User::find($id);
        if ($customer) {
            // Update the customer with validated data
            
            $customer->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_no' => $request->phone_no,
                'gender' => $request->gender,
                'suspended' => $request->suspended,
                'status' => $request->status
            ]);
        
            // Handle image update if necessary
            if ($request->hasFile('image')) {
                
                $imagePath = $request->file('image')->store('images', 'public');
                
                $customer->image = $imagePath;
                $customer->save(); // Save after updating image
            }

        return redirect()->route('customers.index')->with('success', 'Customer Updated successfully');

        } else {
            // Redirect with error message if customer not found
            return redirect()->route('customers.index')->with('error', 'Customer not found');
        }

    }

    public function destroy($id)
    {
        // Delete a customer
        
        $customer = User::findOrFail($id);
        if ($customer->image) {
            Storage::disk('public')->delete($customer->image);
        }
        $customer->delete();

        return redirect()->route('customers.index')
                         ->with('success', 'Category deleted successfully.');
    }
}

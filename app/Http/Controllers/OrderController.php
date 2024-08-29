<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Display a listing of orders
    public function index()
    {
        $orders = Order::with('customer')->get(); // Get all orders        
        return view('admin.orders.index', compact('orders')); // Pass orders to the view
    }

    // Show the form for creating a new order
    public function create()
    {
        return view('admin.orders.create'); // Return the create form view
    }

    // Store a newly created order in storage
    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'user_id' => 'required|integer',
            'total_amount' => 'required|numeric',
            'status' => 'required|string|max:255',
        ]);

        // Create and save the order
        Order::create([
            'user_id' => $request->user_id,
            'total_amount' => $request->total_amount,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Order created successfully!');
    }

    // Display the specified order
    public function show($id)
    {
        $order = Order::findOrFail($id); // Find the order by id
        return view('admin.orders.show', compact('order')); // Pass the order to the view
    }

    // Show the form for editing the specified order
    public function edit($id)
    {
        $order = Order::findOrFail($id); // Find the order by id
        return view('admin.orders.edit', compact('order')); // Pass the order to the edit form
    }

    // Update the specified order in storage
    public function update(Request $request, $id)
    {
        // Validate request data
        $request->validate([
            'total_amount' => 'required|numeric',
            'status' => 'required|string|max:255',
        ]);

        // Find the order and update its data
        $order = Order::findOrFail($id);
        $order->update([
            'total_amount' => $request->total_amount,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully!');
    }

    // Remove the specified order from storage
    public function destroy($id)
    {
        $order = Order::findOrFail($id); // Find the order by id
        $order->delete(); // Delete the order

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully!');
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
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

    public function changeStatus(Request $request)
    {
        // Validate the request
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'status' => 'required|in:pending,success,on_the_way'
        ]);

        // Find the order by ID and update its status
        $order = Order::find($request->order_id);
        $order->status = $request->status;
        $order->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Order status updated successfully!');
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
        // $order = OrderDetail::with('product')->findOrFail($id);
        // $order = Order::with('orderDetails.product')->findOrFail($id);
        // $order = Order::findOrFail($id);
        // Fetch order details
        $orders = \DB::table('order_details')
        ->join('products', 'order_details.product_id', '=', 'products.id')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->where('order_details.order_id', $id)
        ->select('order_details.*', 'products.name as product_name',
            'products.selling_price as product_price', 'orders.id as order_id', 'orders.order_number', 
            'users.name', 'users.email', 'users.phone_no')
        ->get();

        // Fetch the order number for display
        $orderNumber = \DB::table('orders')
            ->where('id', $id)
            ->value('order_number'); // Assuming 'order_number' is a field in the 'orders' table

        return view('admin.orders.show', compact('orders', 'orderNumber'));

        // $order = Order::with('orderDetails')->findOrFail($id);
        // dd($order);
        // return view('orders.show', compact('order'));
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


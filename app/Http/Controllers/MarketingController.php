<?php

namespace App\Http\Controllers;

use App\Jobs\NotifyPromotion;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\Promotion;

class MarketingController extends Controller
{
    // Send the Promotion offers to customer
    public function index()
    {
        $orders = Order::with('customer')->get(); // Get all orders        
        return view('admin.marketing.index', compact('orders')); // Pass orders to the view
    }

    public function create()
    {
        $users = User::all(); // Get all orders        
        return view('admin.marketing.create', compact('users')); // Pass orders to the view
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|array',
            'message' => 'required',            
        ]);
        $user_ids = $request->user_id;
        // dd($user_ids);

        $promotion = Promotion::create([
            'user_id' => json_encode($user_ids), // Store multiple user IDs
            'message' => $request->message, // Store the promotion message
        ]);

       NotifyPromotion::dispatch($user_ids , $promotion);
        
        return redirect()->back()->with('success', 'Promotion created successfully');
    }    

}


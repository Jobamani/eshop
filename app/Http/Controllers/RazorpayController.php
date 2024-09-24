<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;
use App\Models\Category;
use App\Models\Order;
use App\Models\Cart;

class RazorpayController extends Controller
{

    public function success(Request $request)
    {
        try {
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

            $attributes = array(
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature
            );
            
            $api->utility->verifyPaymentSignature($attributes);
            // Fetch the order details based on the razorpay_order_id
            $order = Order::where('razorpay_order_id', $request->razorpay_order_id)->firstOrFail();

            // Get the order number (or receipt_id) from the retrieved order
            $orderNumber = $order->order_number; // or use $order->receipt_id if you're using receipt_id
            $order->payment_status = "Paid";
            $order->payment_method = "Prepaid";
            $order->save();
            
            $category = Category::all();
            $hide= true; 
            $cartItems = Cart::with('product') // assuming you have a relationship between Cart and Product models
            ->where('user_id', auth()->id())
            ->get();
            $totalAmount = $cartItems->sum(function ($item) {
                return $item->quantity * $item->product->selling_price;
                });
            // Payment was successful, handle your logic here
            return view('frontend.checkout.success' , compact(['category','hide','orderNumber','cartItems','totalAmount']));
        } catch (Exception $e) {
            // Payment failed, redirect or show an error
            return redirect()->route('razorpay.failure');
        }
    }

    public function failure()
    {
        return view('frontend.checkout.failure');
    }
}

?>

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Cart;
use App\Models\Category;
use Razorpay\Api\Api;

class CheckoutController extends Controller
{
    public function index()
    {
        // Get cart data, user info, and any other necessary data for checkout
        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
        $category=Category::all();
        $hide= true; 

        // Calculate the cart subtotal
        $cartSubtotal = $cartItems->sum(function ($cartItem) {
            return $cartItem->product->mrp_price * $cartItem->quantity;
        });

        // Calculate the savings (assuming you have a discount logic)
        $cartSavings = $cartItems->sum(function ($cartItem) {
            return ($cartItem->product->mrp_price - $cartItem->product->selling_price) * $cartItem->quantity;
        });

        // Set shipping cost (could be dynamic)
        $shippingCost = $cartSubtotal > 500 ? 0 : 50;

        // Calculate the total to pay
        $cartTotal = $cartSubtotal - $cartSavings + $shippingCost;
        $totalAmount = $cartSubtotal - $cartSavings + $shippingCost;
        return view('frontend.checkout.index', compact('cartItems','category','hide','cartSubtotal', 'cartSavings', 'shippingCost', 'cartTotal','totalAmount'));
    }

    public function store(Request $request)
    {    
        // Validate and process the checkout
        $request->validate([
            'address' => 'required|string|max:255',
            'payment_method' => 'required|string',
            'cart_value' => 'required',
        ]);

        if($request->payment_method == "cod")
        {
            // Create an order based on the cart items and user data        
            $order = Order::create([
                'user_id' => auth()->id(),           
                'order_number' => generateUniqueOrderNumber(),
                'total_amount' => $request->cart_value,
                'status' => 'pending',
                'shipping_address' => $request->address,
                'payment_method' => $request->payment_method,
            ]);

            // Fetch all cart items for the authenticated user
            $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
            
            // Create order details for each cart item
            foreach ($cartItems as $item) {
            
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'price' => $item->product->selling_price,
                    'status' => 'pending',
                    'quantity' => $item->quantity,
                ]);
            }

        
            // Clear the cart after order is created
            Cart::where('user_id', auth()->id())->delete();

            // Redirect to success page with order number
            return redirect()->route('checkout.success', ['order_number' => $order->order_number])
            ->with('success', 'Order has been placed successfully!');
        }elseif($request->payment_method == "prepaid"){
           return $this->prepaidOrder($request);
        }


        
    }

    private function calculateTotal()
    {
        // Implement the logic to calculate the total based on the cart items
        return Cart::where('user_id', auth()->id())->sum('total_price');
    }

    public function success(Request $request)
    {
        $category=Category::all();
        $hide= true; 
        $orderNumber = $request->order_number; // Get the order number from the request
        return view('frontend.checkout.success', compact('category','hide','orderNumber'));
    }
    
     /**
     * Handle Prepaid Orders (Razorpay)
     */
    private function prepaidOrder($request)
    {
        // Create the order first
        $order = Order::create([
            'user_id' => auth()->id(),
            'order_number' => generateUniqueOrderNumber(), // Helper function to generate order number
            'total_amount' => $request->cart_value,
            'status' => 'pending',
            'shipping_address' => $request->address,
            'payment_method' => 'prepaid',
        ]);

        // Initialize Razorpay API
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        // dd($api);
        // Create Razorpay order
        $razorpayOrder = $api->order->create([
            'receipt' => $order->order_number,  // Use order number as receipt
            'amount' => $order->total_amount * 100,  // Amount in paise
            'currency' => 'INR',
        ]);

        // Step 3: Update the order with the Razorpay Order ID
        $order->razorpay_order_id = $razorpayOrder['id'];
        $order->save();
        
        // dd( $razorpayOrder);
        // Fetch all cart items for the authenticated user
        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();

        // Create order details for each cart item
        foreach ($cartItems as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'price' => $item->product->selling_price,
                'status' => 'pending',
                'quantity' => $item->quantity,
            ]);
        }

        // Clear the cart after the order is created
        Cart::where('user_id', auth()->id())->delete();

        // Pass necessary data to Razorpay view
        return view('frontend.checkout.razorpay', [
            'order_id' => $razorpayOrder->id,
            'amount' => $order->total_amount,
            'razorpayKey' => env('RAZORPAY_KEY'),
            'currency' => 'INR',
            'order' => $order
        ]);
    }

}

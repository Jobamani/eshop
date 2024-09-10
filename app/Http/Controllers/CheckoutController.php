<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Cart;
use App\Models\Category;

class CheckoutController extends Controller
{
    public function index()
    {
        // Get cart data, user info, and any other necessary data for checkout
        $cartItems = Cart::where('user_id', auth()->id())->get();
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
        return view('frontend.checkout.index', compact('cartItems','category','hide','cartSubtotal', 'cartSavings', 'shippingCost', 'cartTotal'));
    }

    public function store(Request $request)
    {    
       
        // Validate and process the checkout
        $request->validate([
            'address' => 'required|string|max:255',
            'payment_method' => 'required|string',
            'cart_value' => 'required',
        ]);

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
}

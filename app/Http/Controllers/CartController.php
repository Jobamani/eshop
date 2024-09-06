<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Category;
class CartController extends Controller
{
    // Display the cart
    public function index()
    {
        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
        // dd($cartItems);
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

        return view('frontend.cart.index', compact('cartItems','category','hide','cartSubtotal', 'cartSavings', 'shippingCost', 'cartTotal'));
    }

    public function addToCart(Request $request)
    {
        $cartItem = Cart::where('product_id', $request->product_id)
            ->where('user_id', auth()->id())
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity; // Add the quantity if the item exists
        } else {
            $cartItem = new Cart;
            $cartItem->user_id = auth()->id();
            $cartItem->product_id = $request->product_id;
            $cartItem->quantity = $request->quantity; // Use the selected quantity
        }

        $cartItem->save();

        return response()->json(['status' => 'success', 'message' => 'Product added to cart!']);
    }

    public function update(Request $request)
{
    $cartItem = Cart::find($request->id);
    if ($cartItem) {
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return response()->json(['status' => 'success', 'message' => 'Quantity updated successfully']);
    }

    return response()->json(['status' => 'error', 'message' => 'Item not found']);
}

public function removeCartItem($id)
{
    $cartItem = Cart::findOrFail($id);

    if ($cartItem->user_id !== auth()->id()) {
        return response()->json(['message' => 'Unauthorized action.'], 403);
    }

    $cartItem->delete();

    return response()->json(['message' => 'Item removed from cart successfully.']);
}


}

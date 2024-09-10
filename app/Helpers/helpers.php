<?php
use Illuminate\Support\Str;
use App\Models\Order;

if (!function_exists('generateUniqueOrderNumber')) {
    function generateUniqueOrderNumber() {
        $datePart = date('Ymd'); // Get current date in YYYYMMDD format
        $randomString = Str::random(6); // Generate a random 6-character string
        $orderNumber = 'ORD-' . $datePart . '-' . $randomString;

        // Check for uniqueness
        while (Order::where('order_number', $orderNumber)->exists()) {
            // If a duplicate exists, regenerate the random part
            $randomString = Str::random(6);
            $orderNumber = 'ORD-' . $datePart . '-' . $randomString;
        }

        return $orderNumber;
    }
}

<!-- resources/views/checkout/razorpay.blade.php -->
<!-- <h1 id="msgbox">Redirecting to Payment Gateway...</h1> -->

<!-- Razorpay form -->
<form id="razorpay-form" action="{{ route('razorpay.success') }}" method="POST">
    @csrf
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_order_id" id="razorpay_order_id" value="{{ $order_id }}">
    <input type="hidden" name="razorpay_signature" id="razorpay_signature">
</form>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "{{ $razorpayKey }}", // Razorpay API Key
    "amount": "{{ $amount * 100 }}", // Amount in paise
    "currency": "{{ $currency }}", // Currency
    "order_id": "{{ $order_id }}", // Razorpay order ID
    "handler": function (response) {
        // When payment is completed, submit the form with Razorpay response details
        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
        document.getElementById('razorpay_signature').value = response.razorpay_signature;
        document.getElementById('razorpay-form').submit();
    },
    "theme": {
        "color": "#3399cc" // Optional: Customize the color of the Razorpay popup
    },
};

// Automatically open Razorpay payment popup when the page loads
var rzp1 = new Razorpay(options);
window.onload = function() {
    rzp1.open();
    // document.getElementById("#msgbox").style.display="none";
};
</script>

@extends('frontend.layouts.master')
@section('content')



	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">Checkout</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
			
		<!-- Start Checkout -->
		<section class="shop checkout section">
			<div class="container">
				<div class="row"> 
					<div class="col-lg-8 col-12">
						<div class="checkout-form">
							<h2>Make Your Checkout Here</h2>
							<p>Please register in order to checkout more quickly</p>
							<!-- Form -->
							<form class="form" method="post" action="{{route('place.order')}}">
							@csrf
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Name<span>*</span></label>
											<input type="text" name="name" placeholder="" required="required" value="{{auth()->user()->name}}">
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Email Address<span>*</span></label>
											<input type="email" name="email" placeholder="" required="required"  value="{{auth()->user()->email}}">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Phone Number<span>*</span></label>
											<input type="number" name="number" placeholder="" required="required"  value="{{auth()->user()->phone_no}}">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Country<span>*</span></label>
											<select name="country" id="country">
												<option value="india" selected="selected">INDIA</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>State / Divition<span>*</span></label>
											<select name="state" id="state-province">
												<option value="hyderabad" selected="selected">Hyderabad</option>											
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Address<span>*</span></label>
											<textarea name="address" id=""></textarea>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Postal Code<span>*</span></label>
											<input type="text" name="pincode" placeholder="" required="required">
										</div>
									</div>

									<div class="col-12">
										<div class="form-group create-account">
											<input id="cbox" type="checkbox">
											<label>Create an account?</label>
										</div>
									</div>
								</div>
							
						</div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="order-details">
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>CART  TOTALS</h2>
								<div class="content">
								<ul>
								
									@foreach($cartItems as $item)									
											<li>{{ $item->product->name }} - {{ $item->quantity }} x RS {{ $item->product->mrp_price }}</li>
											<li>Sub Total: RS {{ $item->quantity * $item->product->mrp_price }}</li>
											<li class="last">Total: RS {{ $item->quantity * $item->product->selling_price }}</li>
											<input type="hidden" name="cart_value" value="{{ $item->quantity * $item->product->selling_price }}">
									@endforeach
									</ul>

								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>Payments</h2>
								<div class="content">
										<div class="radio ml-4">
											<label class="radio-inline">
												<input class="radio-inline"  type="radio" name="payment_method" value="cod" id="2"> Cash On Delivery
											</label>
											</br>
											<label class="radio-inline">
												<input class="radio-inline"  type="radio" name="payment_method" value="prepaid" id="3"> Online /UPI
											</label>
										</div>
									</div>
							</div>
							<!--/ End Order Widget -->
						
							<!-- Payment Method Widget -->
							<div class="single-widget payement">
								<div class="content">
									<img src="{{asset('frontend/images/payment-method.png')}}" alt="#">
								</div>
							</div>
							<!--/ End Payment Method Widget -->
							<!-- Button Widget -->
							<div class="single-widget get-button">
								<div class="content">
									<div class="button">
										<!-- <a href="#" class="btn">proceed to checkout</a> -->
										<input type="submit" value="proceed to checkout" class="btn">
									</div>
								</div>
							</div>
							<!--/ End Button Widget -->
							</form>
							<!--/ End Form -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Checkout -->
			
	<!-- Start Shop Services Area  -->
	<section class="shop-services section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Free shiping</h4>
						<p>Orders over Rs 1000</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 30 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Peice</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->
	
	<!-- Start Shop Newsletter  -->
	<section class="shop-newsletter section">
		<div class="container">
			<div class="inner-top">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 col-12">
						<!-- Start Newsletter Inner -->
						<div class="inner">
							<h4>Newsletter</h4>
							<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
							<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
								<input name="EMAIL" placeholder="Your email address" required="" type="email">
								<button class="btn">Subscribe</button>
							</form>
						</div>
						<!-- End Newsletter Inner -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->
@endsection


@push('page-script')

<script>
$(document).ready(function() {
    $('.btn-number').click(function(e) {
        e.preventDefault();

        var type = $(this).data('type');
        var cartItemId = $(this).data('id');
        var inputField = $('#cart-quantity-' + cartItemId);
        var quantity = parseInt(inputField.val());
        var price = parseFloat($('.price span').text().replace('RS ', ''));

        if (type === 'plus') {
            quantity += 1;
        } else if (type === 'minus' && quantity > 1) {
            quantity -= 1;
        }

        inputField.val(quantity);

        // Update the total amount
        $('#cart-total-' + cartItemId).text('RS ' + (price * quantity));

        // Send AJAX request to update quantity in the backend
        $.ajax({
            url: '{{ route('cart.update') }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: cartItemId,
                quantity: quantity
            },
            success: function(response) {
                // Handle success
            },
            error: function(response) {
                alert('Error updating quantity');
            }
        });
    });


    $('.remove-cart-item').click(function(e) {
        e.preventDefault();

        // Get the cart item ID from the data attribute
        var cartItemId = $(this).data('id');

        // Trigger SweetAlert confirmation popup
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, remove it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Proceed with the AJAX request if user confirms
                $.ajax({
                    url: '/cart/' + cartItemId,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}" // Ensure CSRF token is passed
                    },
                    success: function(response) {
                        // Show SweetAlert success message
                        Swal.fire({
                            title: 'Removed!',
                            text: response.message,
                            icon: 'success',
                            timer: 1500, // Auto-close after 1.5 seconds
                            showConfirmButton: false, // Remove OK button
                            willClose: () => {
                                // Reload the page or perform another action after the SweetAlert closes
                                location.reload();
                            }
                        });
                    },
                    error: function(xhr) {
                        // Show SweetAlert error message
                        Swal.fire(
                            'Oops!',
                            'Something went wrong while removing the item.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});
</script>

@endpush
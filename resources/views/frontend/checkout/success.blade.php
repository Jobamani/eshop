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
							<li class="active"><a href="blog-single.html">Success</a></li>
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
						<h3>Thank you for your order!</h3>
						<p>Your order number is: <strong>{{ $orderNumber }}</strong></p>
						<a href="/" class="btn mt-3">Back to Home</a>
					</div>
				</div>
			</div>
		</section>
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
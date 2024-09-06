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
							<li class="active"><a href="blog-single.html">Cart</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
			
	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>PRODUCT</th>
								<th>NAME</th>
								<th class="text-center">UNIT PRICE</th>
								<th class="text-center">QUANTITY</th>
								<th class="text-center">TOTAL</th> 
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody>
                        @foreach($cartItems as $cartItem)
                        <tr>
                            <td class="image" data-title="No"><img src="https://via.placeholder.com/100x100" alt="#"></td>
                            <td class="product-des" data-title="Description">
                                <p class="product-name"><a href="#">{{$cartItem->product->name}}</a></p>
                                <p class="product-des">{{$cartItem->product->description}}</p>
                            </td>
                            <td class="price" data-title="Price"><span>RS {{$cartItem->product->mrp_price}}</span></td>
                            <td class="qty" data-title="Qty">
                                <!-- Input Order -->
                                <div class="input-group">
                                    <div class="button minus">
                                        <button type="button" class="btn btn-primary btn-number" data-type="minus" data-id="{{ $cartItem->id }}">
                                            <i class="ti-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="quant[{{ $cartItem->id }}]" class="input-number" data-min="1" data-max="100" value="{{ $cartItem->quantity }}" id="cart-quantity-{{ $cartItem->id }}">
                                    <div class="button plus">
                                        <button type="button" class="btn btn-primary btn-number" data-type="plus" data-id="{{ $cartItem->id }}">
                                            <i class="ti-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="total-amount" data-title="Total"><span id="cart-total-{{ $cartItem->id }}">RS {{$cartItem->product->mrp_price * $cartItem->quantity}}</span></td>
                            <td class="action" data-title="Remove">
                            <button type="button" class="btn btn-danger remove-cart-item" data-id="{{ $cartItem->id }}">
                                <i class="ti-trash remove-icon"></i>
                            </button>
                        </td>

                        </tr>
                        @endforeach

						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								<div class="left">
									<div class="coupon">
										<form action="#" target="_blank">
											<input name="Coupon" placeholder="Enter Your Coupon">
											<button class="btn">Apply</button>
										</form>
									</div>
									<div class="checkbox">
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+50 Rs)</label>
									</div>
								</div>
							</div>
                            <div class="col-lg-4 col-md-7 col-12">
                            <div class="right">
                                <ul>
                                    <li>Cart Subtotal<span>RS {{ number_format($cartSubtotal, 2) }}</span></li>
                                    <li>Shipping<span>{{ $shippingCost > 0 ? 'RS ' . number_format($shippingCost, 2) : 'Free' }}</span></li>
                                    <li>You Save<span>RS {{ number_format($cartSavings, 2) }}</span></li>
                                    <li class="last">You Pay<span>RS {{ number_format($cartTotal, 2) }}</span></li>
                                </ul>
                                <div class="button5">
                                    <a href="" class="btn">Checkout</a>
                                    <a href="{{route('homepage')}}" class="btn">Continue shopping</a>
                                </div>
                            </div>
                            </div>

						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->
			
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
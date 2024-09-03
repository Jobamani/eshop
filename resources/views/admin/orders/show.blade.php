@extends('admin.layouts.inc.master')

@section('content')

<div class="container">
    <h1>Order #{{ $orders->first()->order_id }}</h1> <!-- Display order ID or number if it exists -->

    <div class="card">
        <div class="card-header">
            <h3>Item Details</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>HRS/QTY</th>
                        <th>Rate</th>
                        <th>Customer Name</th>
                        <th>Subtotal</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>                                
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->product_name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->product_price }}</td>
                            <td>{{ $order->name }}</td>   
                            <td>Rs: {{ $order->product_price * $order->quantity }}</td>                         
                            <td>
                                {{ $order->status ?? 'Pending' }} <!-- Show status or default to 'Pending' -->
                            </td>
                            <td>
                                <button class="btn btn-warning" data-toggle="modal" data-value="{{ $order->id }}" data-target="#changeStatus">Change Status</button>
                            </td>
                        </tr>                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <a href="{{ route('orders.index') }}" class="btn btn-primary mt-3">Back to Orders</a>

    <!-- Modal Code -->
    <div class="modal fade" id="changeStatus" tabindex="-1" aria-labelledby="changeStatusLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changeStatusLabel">Change Order Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('orders.changeStatus') }}" method="POST">
                        @csrf
                        <!-- Hidden input to hold the order ID -->
                        <input type="hidden" name="order_id" id="modalOrderId">
                        
                        <div id="modalOrderIdDisplay"></div>

                        <div class="form-group">
                            <label for="status">Select Status</label>
                            <select class="form-select" name="status">
                                <option value="pending">Pending</option>
                                <option value="success">Success</option>
                                <option value="processing">Processing</option>
                                <option value="picked">Picked</option>
                                <option value="shipped">Shipped</option>
                                <option value="delivery">Delivery</option>
                                <option value="cancel">Cancel</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal Code -->
</div>


<script>
    $(document).ready(function () {
        console.log("click");
        // When the modal is shown
        $('#changeStatus').on('click', function (event) {
            console.log("click");
            // Button that triggered the modal
            var button = $(event.relatedTarget);
            
            // Extract the order ID from the button's data-* attribute
            var orderId = button.data('value');
            console.log("order", orderId);
            
            // Find the modal and set the order ID in the modal's body and hidden input field
            var modal = $(this);
            modal.find('#modalOrderIdDisplay').text('Order ID: ' + orderId); // Display in div
            modal.find('#modalOrderId').val(orderId); // Set in hidden input field
        });
    });
</script>

@endsection
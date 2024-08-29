@extends('admin.layouts.inc.master')

@section('content')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
        <!-- page title  -->
        <div class="page-header">
            <h3 class="page-title"> Add Orders </h3>
            
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item "><a href="{{route('admin.dashboard')}}">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="{{route('managecategory')}}">Categories</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Category</li>
                </ol>
              </nav>
        </div>
        <!-- end page title -->

        <!-- name, desc -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
        <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">add</h4>                    
                    <form action="{{route('admin.orders.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputname1">User_Id</label>
                        <input type="number" name="user_id" value="{{ $order->user_id ?? old('user_id') }}" placeholder="User ID">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputdescription1">Total Amount</label>
                        <input type="number" name="total_amount" value="{{ $order->total_amount ?? old('total_amount') }}" placeholder="Total Amount">
                       
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputname1">Status</label>
                        <input type="text" name="status" value="{{ $order->status ?? old('status') }}" placeholder="Status">
                    </div> 
                  

                    
                      <button type="submit" class="btn btn-gradient-primary me-2">Add</button>
                      <button class="btn btn-light">Cancel</button>
                    
                    </form>
                  </div>
                </div>
              </div>

    </div>
    </div>  

@endsection

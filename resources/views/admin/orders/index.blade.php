@extends('admin.layouts.inc.master')

@section('content')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
        <!-- page title  -->
        <div class="page-header">
            <h3 class="page-title"> Orders </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item "><a href="{{route('admin.dashboard')}}">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Orders</li>
                </ol>
              </nav>
        </div>
        <!-- end page title -->
         <a class= "btn btn-success mb-2" href="{{route('admin.orders.create')}}">Add</a>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif 
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Manage Orders</h4>  
                    <div class="table-responsive">
                               
                        <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Customer Name</th>
                          <th>Order Number</th>  
                          <th>Total Amount</th>  
                          <th>Action</th>                         
                          <th>Create Date</th>
                        </tr>
                      </thead>
                                           
                      <tbody>
                        @foreach($orders as $row)
                           
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->customer->name}}</td>
                                <td>{{$row->order_number}}</td>
                                <td>{{$row->total_amount}}</td>                               
                                
                                <td>
                                <a class="badge badge-primary" href="{{url('admin/orders-view-page/'.$row->id.'/view')}}">View</a>
                                <a class="badge badge-danger" href="{{url('admin/orders-destroy/'.$row->id. '/destroy')}}">Delete</a>
                                </td>
                                <td>{{$row->created_at}}</td>
                            </tr>
                        @endforeach    
                      
                               
                      </tbody>


                        </table>
                    </div>
                  </div>
                </div>
              </div>
        </div> <!--end content-wrapper-->
    </div> <!--end main-panel-->

@endsection
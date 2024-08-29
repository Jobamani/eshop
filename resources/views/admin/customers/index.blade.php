@extends('admin.layouts.inc.master')

@section('content')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
        <!-- page title  -->
        <div class="page-header">
            <h3 class="page-title"> Customers </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item "><a href="{{route('admin.dashboard')}}">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Customers</li>
                </ol>
              </nav>
        </div>
        <!-- end page title -->
         <a class= "btn btn-success mb-2" href="{{route('admin.customers.create')}}">Add</a>
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
                    <h4 class="card-title">Manage Customer</h4>  
                    <div class="table-responsive">
                               
                        <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Customer Id</th>
                          <th>Customer Name</th>
                          <th>Email</th>  
                          <th>Phone no</th>   
                          <th>Gender</th>                       
                          <th>image</th>  
                          <th>suspended</th>                      
                          <th>Status</th>
                          <th>Action</th>
                          <th>Create Date</th>
                        </tr>
                      </thead>
                                           
                      <tbody>
                        @foreach($customers as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->phone_no}}</td>
                                <td>{{$row->gender}}</td>
                                <td>
                                    @if($row->image)                                      
                                        <img class="btn-btn-info mg-2" src="{{ asset('storage/' . $row->image) }}" alt="{{ $row->name }}" width="100" style="margin: 5px;">
                                    @endif
                                </td>
                                <td>
                                  @if($row->suspended == 0)
                                  <i class="fa fa-check-circle text-success"></i> Not Suspended
                                  @else
                                  <i class="fa fa-ban text-danger"></i> Suspended
                                  @endif
                                </td>
                                <td>
                                  @if($row->status == 'active')
                                  <i class="fa fa-check-circle text-success"></i> Active
                                  @else
                                  <i class="fa fa-times-circle text-danger"></i> Inactive
                                  @endif

                                </td>
                                <td>
                                <a class="badge badge-primary" href="{{url('admin/customers-edit-page/'.$row->id.'/edit')}}">Edit</a>
                                <a class="badge badge-danger" href="{{url('admin/customers-destroy/'.$row->id. '/destroy')}}">Delete</a>
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
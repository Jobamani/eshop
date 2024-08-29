@extends('admin.layouts.inc.master')

@section('content')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
        <!-- page title  -->
        <div class="page-header">
            <h3 class="page-title"> Edit Customers </h3>
            
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item "><a href="{{route('admin.dashboard')}}">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="{{route('managecategory')}}">Customers</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
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
                    <h4 class="card-title">edit</h4>
                    <p class="card-description"> Basic form layout </p>
                    <form action="{{route('customers.update',$Customers->id)}}" enctype="multipart/form-data" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputname1">Customer name</label>
                        <input type="text" class="form-control" id="exampleInputname1" placeholder="name" name="name" value="{{$Customers->name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputdescription1">Email</label>
                        <input type="email" class="form-control" id="exampleInputdescription" placeholder="email" name="email" value="{{$Customers->email}}">
                       
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputname1">Phone no</label>
                        <input type="text" class="form-control" id="exampleInputname1" placeholder="phone_no" name="phone_no" value="{{$Customers->phone_no}}">
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputname1">Gender</label>
                        <input type="text" class="form-control" id="exampleInputname1" placeholder="gender" name="gender" value="{{$Customers->gender}}">
                    </div>
                    <div>
                      <label for="image">Image:</label>
                      <input type="file" id="image" name="image" class= "form-control mb-2">
                    </div>  
                    <div class="form-group">
                      <label for="suspended">Suspended</label>
                      <select name="suspended" class="form-control" id="suspended">
                          <option value="0" {{ $Customers->suspended == 0 ? 'selected' : '' }}>Not Suspended</option>
                          <option value="1" {{ $Customers->suspended == 1 ? 'selected' : '' }}>Suspended</option>
                      </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputname1">Status</label>                        
                        <select name="status" class="form-control" id="suspended">
                          <option value="inactive" {{ $Customers->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                          <option value="active" {{ $Customers->status == 'active' ? 'selected' : '' }}>active</option>
                      </select>
                    </div> 
                                    
                    <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                    <button class="btn btn-light">Cancel</button>
                    
                    </form>
                  </div>
                </div>
              </div>

    </div>
    </div>  

@endsection

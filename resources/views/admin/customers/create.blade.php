@extends('admin.layouts.inc.master')

@section('content')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
        <!-- page title  -->
        <div class="page-header">
            <h3 class="page-title"> Add Categories </h3>
            
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
                    <form action="{{route('admin.customers.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputname1">Customer name</label>
                        <input type="text" class="form-control" id="exampleInputname1" placeholder="name" name="name" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputdescription1">Email</label>
                        <input type="email" class="form-control" id="exampleInputdescription" placeholder="email" name="email" value="">
                       
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputdescription1">Password</label>
                        <input type="password" class="form-control" id="exampleInputdescription" placeholder="password" name="password" value="">
                       
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputname1">Phone no</label>
                        <input type="text" class="form-control" id="exampleInputname1" placeholder="phone_no" name="phone_no" value="">
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputname1">Gender</label>
                        <input type="text" class="form-control" id="exampleInputname1" placeholder="gender" name="gender" value="">
                    </div>
                    <div>
                      <label for="image">Image:</label>
                      <input type="file" id="image" name="image" class= "form-control mb-2">
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

@extends('admin.layouts.inc.master')

@section('content')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
        <!-- page title  -->
        <div class="page-header">
            <h3 class="page-title"> Add Products </h3>
            
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item "><a href="{{route('admin.dashboard')}}">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="{{route('products.index')}}">Products</a></li>
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
                    <form action="{{route('create-product-store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputname1">name</label>
                        <input type="text" class="form-control" id="exampleInputname1" placeholder="name" name="name" value="">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputdescription1">description</label>
                        <input type="description" class="form-control" id="exampleInputdescription" placeholder="description" name="description" value="">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputname1">category</label>
                        <!-- <input type="text" class="form-control" id="exampleInputname1" placeholder="category" name="category" value=""> -->
                        <!-- <select name="category" > -->
                        <div class="form-group">
                          <select name="category" class="js-example-basic-single form-control" style="width:100%">
                            <option value="">--Select Category--</option>
                            @foreach($category as $cat) 
                            <option value="{{$cat->id}}">{{$cat->name}}</option>                        
                            @endforeach
                          </select>
                      </div>     
                      <div>
                      <label for="image">Image:</label>
                      <input type="file" id="image" name="image" class= "form-control mb-2">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputname1">mrp price</label>
                        <input type="text" class="form-control" id="exampleInputname1" placeholder="mrp price" name="mrp_price" value="">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputname1">selling price</label>
                        <input type="text" class="form-control" id="exampleInputname1" placeholder="selling price" name="selling_price" value="">
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

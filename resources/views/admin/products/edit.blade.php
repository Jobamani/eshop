@extends('admin.layouts.inc.master')

@section('content')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
        <!-- page title  -->
        <div class="page-header">
            <h3 class="page-title"> Edit Product </h3>
            
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item "><a href="{{route('admin.dashboard')}}">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="{{route('products.index')}}">Products</a></li>
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
                    <form action="{{route('product.update',$products->id)}}" enctype="multipart/form-data" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputname1">Name</label>
                        <input type="text" class="form-control" id="exampleInputname1" placeholder="name" name="name" value="{{$products->name}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputdescription1">Description</label>
                        <input type="description" class="form-control" id="exampleInputdescription" placeholder="description" name="description" value="{{$products->description}}">
                        <!-- <span class="text-danger"> --putting error messgae below the respective field--
                            @error('name')
                              {{$message}}   
                            @enderror                        
                        </span> -->
                      </div>  
                      <div class="form-group">
                        <label for="exampleInputname1">Category</label>
                        <!-- <input type="text" class="form-control" id="exampleInputname1" placeholder="category" name="category" value="{{$products->category}}"> -->
                        <select name="category" class="form-control">
                          <option value="">--Select Category--</option>
                          @foreach($category as $cat) 
                          <option value="{{ $cat->id }}" {{ $cat->id == $products->category_id ? 'selected' : '' }}>
                              {{ $cat->name }}
                          </option>
                          @endforeach
                        </select>
                      </div>            
                      <div>
                      <label for="image">Image:</label>
                      <input type="file" id="image" name="image" class= "form-control mb-2">
                      </div>  
                      <div class="form-group">
                        <label for="exampleInputname1">Mrp Price</label>
                        <input type="text" class="form-control" id="exampleInputname1" placeholder="Mrp price" name="mrp_price" value="{{$products->mrp_price}}">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputname1">Selling Price</label>
                        <input type="text" class="form-control" id="exampleInputname1" placeholder="selling_price" name="selling_price" value="{{$products->selling_price}}">
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

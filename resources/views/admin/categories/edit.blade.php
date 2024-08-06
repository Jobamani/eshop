@extends('admin.layouts.inc.master')

@section('content')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
        <!-- page title  -->
        <div class="page-header">
            <h3 class="page-title"> Edit Categories </h3>
            
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item "><a href="{{route('admin.dashboard')}}">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="{{route('managecategory')}}">Categories</a></li>
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
                    <form action="{{route('update-category',$categories->id)}}" enctype="multipart/form-data" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputname1">name</label>
                        <input type="text" class="form-control" id="exampleInputname1" placeholder="name" name="name" value="{{$categories->name}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputdescription1">description</label>
                        <input type="description" class="form-control" id="exampleInputdescription" placeholder="description" name="description" value="{{$categories->description}}">
                        <!-- <span class="text-danger"> --putting error messgae below the respective field--
                            @error('name')
                              {{$message}}   
                            @enderror                        
                        </span> -->
                      </div>  
                      <div>
                      <label for="image">Image:</label>
                      <input type="file" id="image" name="image" class= "form-control mb-2">
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

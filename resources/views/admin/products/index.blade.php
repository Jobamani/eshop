@extends('admin.layouts.inc.master')

@section('content')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
        <!-- page title  -->
        <div class="page-header">
            <h3 class="page-title"> Products </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item "><a href="{{route('admin.dashboard')}}">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Products</li>
                </ol>
              </nav>
        </div>
        <!-- end page title -->
         <a class= "btn btn-success mb-2" href="{{route('create-category')}}">Add</a>
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
                    <h4 class="card-title">Manage Product</h4>                                 
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Product Id</th>
                          <th>Product Name</th>
                          <th>Description</th>   
                          <th>image</th>                        
                          <th>Status</th>
                          <th>Action</th>
                          <th>Create Date</th>
                        </tr>
                      </thead>
                                           
                      <tbody>
                      @foreach($products as $row) 
                        <tr>
                          <td>{{$row->id}}</td>
                          <td>{{$row->name}}</td>
                          <td>{{$row->description}}</td>
                          <td>
                              @if($row->image)
                                  <a href="{{ route('product.image', $product->id) }}">
                                  <img class="btn-btn-info mg-2" src="{{ asset('assets/https://4.imimg.com/data4/OX/UR/MY-30067290/women-apperal-500x500.jpg' . $category->image) }}" alt="{{ $category->name}}" width="100" style="margin: 5px";>
                              @endif
                          </td>
                          <td class="text-success"> ON <i class="mdi mdi-arrow-up"></i></td>
                          <td>                          
                            <a class="badge badge-primary" href="{{url('admin/product-edit/'.$row->id.'/edit')}}">Edit</a>
                            <a class="badge badge-danger" href="{{url('admin/product-destroy/'.$row->id. '/destroy')}}">Delete</a>
                            
                          </td>
                          <td>{{$row->created_at}}</td>
                        </tr>    
                        @endforeach          
                      </tbody>


                    </table>
                  </div>
                </div>
              </div>
        </div> <!--end content-wrapper-->
    </div> <!--end main-panel-->

@endsection
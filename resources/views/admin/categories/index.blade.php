@extends('admin.layouts.inc.master')

@section('content')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
        <!-- page title  -->
        <div class="page-header">
            <h3 class="page-title"> Categories </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item "><a href="{{route('admin.dashboard')}}">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Categories</li>
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
                    <h4 class="card-title">Manage Category</h4>                                 
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Category Id</th>
                          <th>Category Name</th>
                          <th>Description</th>                            
                          <th>image</th>                        
                          <th>Status</th>
                          <th>Action</th>
                          <th>Create Date</th>
                        </tr>
                      </thead>
                                           
                      <tbody>
                      @foreach($categories as $row)  
                        <tr>
                          <td>{{$row->id}}</td>
                          <td>{{$row->name}}</td>
                          <td>{{$row->description}}</td>
                          <td>
                              @if($row->image)
                                  <a href="">
                                  <img class="btn-btn-info mg-2" src="{{ asset('storage/' . $row->image) }}" width="25" style="margin: 5px";>
                              @endif
                          </td>
                          <td class="text-success"> ON <i class="mdi mdi-arrow-up"></i></td>
                          <td>                          
                            <a class="badge badge-primary" href="{{url('admin/category-edit/'.$row->id.'/edit')}}">Edit</a>
                            <a class="badge badge-danger" href="{{url('admin/category-destroy/'.$row->id. '/destroy')}}">Delete</a>
                            
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
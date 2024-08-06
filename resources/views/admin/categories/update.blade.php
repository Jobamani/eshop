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
       
    </div>
    </div>  

@endsection
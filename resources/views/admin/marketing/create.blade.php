@extends('admin.layouts.inc.master')

@section('content')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
        <!-- page title  -->
        <div class="page-header">
            <h3 class="page-title"> Add New Promotion </h3>
            
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item "><a href="{{route('admin.dashboard')}}">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.marketing.send.promo')}}">Manage Marketing</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add New Promotion</li>
                </ol>
              </nav>
        </div>
        <!-- end page title -->

        <!-- name, desc -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
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
                    <form action="{{route('admin.marketing.promo.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                    <label for="selectCustomers">Select Customers</label>
                    <select class=" form-control" id="selectCustomers" name="user_id[]" multiple="multiple">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ in_array($user->id, old('user_id', [])) ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    <button type="button" id="selectAllBtn" class="btn btn-info mt-2">Select All</button>
                </div>
                    <div class="form-group">
                        <label for="exampleInputdescription1">Message</label>
                        <textarea class="form-control" id="exampleInputdescription" placeholder="message" name="message" ></textarea>
                    </div> 
                    
                      <button type="submit" class="btn btn-gradient-primary me-2">Send</button>                                          
                    </form>
                  </div>
                </div>
              </div>

    </div>
    </div>  

@endsection

@push('page-script')
<script>
    $(document).ready(function() {
      console.log("click");
      
        // Initialize Select2
        // $('#selectCustomers').select2({
        //     placeholder: "Select customers",
        //     allowClear: true
        // });

        // // "Select All" functionality
        // $('#selectAllBtn').click(function() {
        //     var allOptions = [];
        //     $('#selectCustomers option').each(function() {
        //         allOptions.push($(this).val());
        //     });
        //     $('#selectCustomers').val(allOptions).trigger('change'); // Select all options
        // });
    });
</script>
@endpush

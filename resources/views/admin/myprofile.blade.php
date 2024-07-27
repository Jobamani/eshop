@extends('admin.layouts.inc.master')

@section('content')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <h1>Welcome, {{ auth()->user()->name }}</h1>
            <!-- <input type="button" value="Update Password"> -->
        </div> <!--end content-wrapper-->
    </div> <!--end main-panel-->

@endsection
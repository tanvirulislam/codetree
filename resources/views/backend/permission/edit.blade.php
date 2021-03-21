@extends('backend.master.master')

@section('title')
Permission Update - Admin Panel
@endsection

@section('style')
<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
@endsection


@section('body')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Permission Update</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.permission') }}">All Permission</a></li>
                    <li><span>Update Permission</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.include.logout')
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Update Permission</h4>
                   
                    
                    <form action="{{ route('admin.permission.update') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control"  name="name" value="{{ $view->name }}" placeholder="Enter a  Name">

                            <input type="hidden" class="form-control"  name="id" value="{{ $view->id }}" placeholder="Enter a  Name">
                        </div>  
                            </div>
                        </div>
                       

<div class="input_field_wrapper">
                              
                               </div>
                      
                        
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update Permission</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>

@endsection

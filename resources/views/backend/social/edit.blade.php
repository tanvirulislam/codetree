@extends('backend.master.master')

@section('title')
Social Update - Admin Panel
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
                <h4 class="page-title pull-left">social Update</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.social') }}">All social</a></li>
                    <li><span>Update social</span></li>
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
                    <h4 class="header-title">Add Social Info</h4>
                   
                    
                    <form action="{{ route('admin.social.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        
<div class="row">
   
                         

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Link</label>
                <input type="text" class="form-control" name="link" placeholder="Link" value="{{ $banners->link }}">
                <input type="hidden" class="form-control" name="id" placeholder="Header Title" value="{{ $banners->id }}">
                            </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Title</label>
                <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $banners->title }}">
                            </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Icon</label>
                <input type="text" class="form-control" name="Icon" placeholder="Icon" value="{{ $banners->Icon }}">
                            </div>
                            </div>
                            


                            


                             
                            
                        </div>

                      
                        
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save </button>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>

@endsection


@section('scipts')
    
@endsection
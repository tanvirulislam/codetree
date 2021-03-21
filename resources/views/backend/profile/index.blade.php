@extends('backend.master.master')
@section('title')
Profile
@endsection

@section('style')
<!-- Start datatable css -->
    
@endsection

@section('body')
  <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Profile</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="{{route('admin.dashboard')}}">DashBoard</a></li>
                                <li><span>{{ Auth::guard('admin')->user()->name }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        @include('backend.include.logout')
                    </div>
                </div>
            </div>
           
               <div class="row">
                   <!-- Primary table start -->
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Update Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Update Password</a>
                                    </li>
                                   
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <div class="container">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <div class="card card-bordered">
                                                @if(Auth::guard('admin')->user()->image == NUll)
                                <img class="card-img-top img-fluid" src="{{asset('/')}}public/admin/assets/images/author/avatar.png" alt="image">
                              @else
<img class="card-img-top img-fluid" src="{{asset('/')}}{{ Auth::guard('admin')->user()->image }}" alt="image">
                              @endif
                            </div>
                                            </div>
                                            <div class="col-md-8">
                                              <div class="card card-bordered">
                                        <div class="card-header bg-info">
                                          <center class="text-white">Personal Info</center>
                                        </div>
                                <div class="card-body">
                                    <h5 class="title"><i class="ti-user"></i><span style="padding-left:10px;">{{ Auth::guard('admin')->user()->name }}</span></h5>

                                    <h5 class="title"><i class="ti-email"></i><span style="padding-left:10px;">{{ Auth::guard('admin')->user()->email }}</span></h5>
                                    
                                    
                                </div>
                            </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                     <form action="{{ url('/') }}/admin/profile/update/{{ Auth::guard('admin')->user()->id  }}" method="POST" enctype="multipart/form-data">
                      @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->name }}"  name="name" placeholder="Enter a  Name">
                        </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                            <label for="name">Email</label>
                            <input type="email" class="form-control"  name="email" placeholder="Enter a  Email" value="{{ Auth::guard('admin')->user()->email}}">
                        </div>  
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                            <label for="name">Profile Photo</label>
                            <input type="file" class="form-control"  name="image" placeholder="Enter a  Image">
                        </div>  
                            </div>
                        </div>

<div class="input_field_wrapper">
                              
                               </div>
                      
                        
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save</button>
                    </form>
                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                          <form method="POST" action="{{ route('admin.password.update') }}" class="form-horizontal">
                                    @csrf
                                    
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="old_password">Old Password : </label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="password" id="old_password" class="form-control" placeholder="Enter your old password" name="old_password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="password">New Password : </label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="password" id="password" class="form-control" placeholder="Enter your new password" name="password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="confirm_password">Confirm Password : </label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="password" id="confirm_password" class="form-control" placeholder="Enter your new password again" name="password_confirmation">
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                                        </div>
                                    </div>
                                </form>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Primary table end -->
               </div>
            </div>
            
@endsection
@section('scipts')
    
@endsection
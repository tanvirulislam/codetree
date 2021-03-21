@extends('backend.master.master')

@section('title')
{{ $view->name }}- Admin Panel
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
                <h4 class="page-title pull-left">Portfolio </h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.portfolio') }}">All Portfolio</a></li>
                    <li><span>{{ $view->name }}</span></li>
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
        <div class="col-6 mt-1">
              <div class="card">
                <div class="card-body">
                    <h4 class="header-title"> Project Name :{{ $view->name }}</h4>
                   
                    
                    
                </div>
            </div>
        </div>
        <div class="col-6 mt-1">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Title Name :{{ $view->title }}</h4>
                   
                    
                    
                </div>
            </div>
        </div>
         <div class="col-6 mt-1">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Client Name :{{ $view->c_name }}</h4>
                   
                    
                    
                </div>
            </div>
        </div>
        <div class="col-6 mt-1">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Website Link:{{ $view->link }}</h4>
                   
                    
                    
                </div>
            </div>
        </div>
        <!-- data table end -->
         <div class="col-12 mt-1">
            <div class="card">
               <img src="{{ asset('/')}}{{$view->image}}" alt="No-image" class="card-img-top" >
            </div>
        </div>
        <div class="col-12 mt-1">
            <div class="card">
               <div class="card-body">
                    <h4 class="header-title">{!! $view->des !!}</h4>
                   
                    
                    
                </div>
            </div>
        </div>
         
    </div>
</div>

@endsection
<script type="text/javascript">
    $(document).ready(function(){
    var maxFieldLimit = 20; //Input fields increment limitation
    var add_more_field = $('.addextras'); //Add button selector
    var Fieldwrapper = $('.input_field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="col-md-8"><div class="form-group" style="clear: both;"><label for="name">Permission Name</label><input type="text" class="form-control" id="name" name="name[]" placeholder="Enter a  Name"></div></div>';

    var x = 1; //Initial field counter is 1
    $(".addextras").click(function(){ //Once add button is clicked

        if(x < maxFieldLimit){ //Check maximum number of input fields
            x++; //Increment field counter
            $(Fieldwrapper).append(fieldHTML); // Add field html
        }
    });
    $(Fieldwrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
@section('scipts')
     
@endsection
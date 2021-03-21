@extends('backend.master.master')

@section('title')
Service Update - Admin Panel
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
                <h4 class="page-title pull-left">Service  Update</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.service') }}">All Service</a></li>
                    <li><span>Update Service</span></li>
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
                    <h4 class="header-title">Update New Service</h4>
                   
                    
                    <form action="{{ route('admin.service.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                            <label for="name">Category Name</label>
                            <select class="form-control" name="s_id">
                                @foreach($categories as $category)
                                <option value="{{$category->slug}}" {{ $category->slug == $view->s_id ? 'selected':'' }}>{{ $category->name }}</option>
                                 @endforeach
                            </select>
                        </div>  
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control"  name="name" placeholder="Enter a  Name" value="{{ $view->name }}">
                             <input type="hidden" class="form-control"  name="id" placeholder="Enter a  Name" value="{{ $view->id }}">
                        </div>  
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-12">
                              <div class="form-group">
                            <label for="name">Image</label>
                            <input type="file" class="form-control"  name="image" placeholder="Enter a  Name">
                        </div>  
                            </div>
                        </div>
                        


                      
                        
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update Service</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
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
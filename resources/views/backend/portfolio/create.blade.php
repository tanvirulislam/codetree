@extends('backend.master.master')

@section('title')
Portfolio Create - Admin Panel
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
                <h4 class="page-title pull-left">Portfolio Category Create</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.portfolio') }}">All Portfolio</a></li>
                    <li><span>Create Portfolio</span></li>
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
                    <h4 class="header-title">Create New Portfolio</h4>
                   
                    
                    <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                            <label for="name">Category Name</label>
                            <select class="form-control" name="cat_id">
                                @foreach($categories as $category)
                                <option value="{{$category->slug}}">{{ $category->name }}</option>
                                 @endforeach
                            </select>
                        </div>  
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control"  name="name" placeholder="Enter a  Name">
                        </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" class="form-control"  name="title" placeholder="Enter a  Title">
                        </div>  
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                            <label for="name">Client Name</label>
                            <input type="text" class="form-control"  name="c_name" placeholder="Enter a  Client Name">
                        </div>  
                            </div>

                            <div class="col-md-3">
                              <div class="form-group">
                            <label for="name">Link</label>
                            <input type="text" class="form-control"  name="link" placeholder="Enter a  Link">
                        </div>  
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                            <label for="name">Image</label>
                            <input type="file" class="form-control"  name="image" placeholder="Enter a  Name">
                        </div>  
                            </div>
                        </div>
                        
<div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                        <label>Description</label>
                      <textarea class="textarea" name="des" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                      </div> 
                            </div>
                            
                        </div>

                      
                        
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Portfolio</button>
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
@extends('backend.master.master')

@section('title')
Social Link Create - Admin Panel
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
                <h4 class="page-title pull-left">Social Link Create</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.team_social_link') }}">All Social Link</a></li>
                    <li><span>Create Social Link</span></li>
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
                    <h4 class="header-title">Add New Social Link</h4>
                   
                    
                    <form action="{{ route('admin.team_social_link.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row form-group">
                       <label class="control-label col-md-3">Name:</label>
                        <div class="col-md-9">
                            <select class="form-control" name="user_name">

                                @foreach($teams as $team)
                                <option value="{{ $team->name }}">{{ $team->name }}</option>
                               @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                       <label class="control-label col-md-3">Facebook:</label>
                        <div class="col-md-9">
                            <input type="text" name="f_link" class="form-control" >
                        </div>
                    </div>
                    <div class="row form-group">
                       <label class="control-label col-md-3">Instagram:</label>
                        <div class="col-md-9">
                            <input type="text" name="ins_link" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                       <label class="control-label col-md-3">LinkedIn:</label>
                        <div class="col-md-9">
                            <input type="text" name="linkin_link" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                       <label class="control-label col-md-3">Github:</label>
                        <div class="col-md-9">
                            <input type="text" name="git_link" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                       <label class="control-label col-md-3">Youtube:</label>
                        <div class="col-md-9">
                            <input type="text" name="you_link" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                       <label class="control-label col-md-3">Pinterest:</label>
                        <div class="col-md-9">
                            <input type="text" name="pin_link" class="form-control">
                        </div>
                    </div>
                 <div class="form-group row">
                        <div class="offset-3 col-md-9">
                            <input type="submit" name="btn" class="btn btn-success" value="Add">
                        </div>
                    </div>
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
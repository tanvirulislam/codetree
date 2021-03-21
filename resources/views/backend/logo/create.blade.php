@extends('backend.master.master')

@section('title')
Logo Create - Admin Panel
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
                <h4 class="page-title pull-left">Logo Create</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.logo') }}">All Logo</a></li>
                    <li><span>Create Logo</span></li>
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
                    <h4 class="header-title">Add New Logo</h4>
                   
                    
                    <form action="{{ route('admin.logo.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        
<div class="row">
   
                         

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name">
                            </div>
                            </div>
                            
<div class="col-md-6">
                              <div class="form-group">
                                <label for="formGroupExampleInput">Logo</label>
                                <input type="file" class="form-control-file"name="image">
                            </div>
                            </div>
                            
<div class="col-md-12">
                              <div class="form-group">
                                <label>Status</label>
                                <select class="custom-select" name="status">
                                    
                        <option value="1" >Logo</option>
                            <option value="0" >Icon</option>       
                                </select>
                            </div>
                            </div>

                             
                            
                        </div>

                      
                        
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Product</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>

@endsection


@section('scipts')
     <script>
    $(document).ready(function(){
        $("#category").on('change',function(){
            var catId=$(this).val();
         //ajax

         $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"{{route('admin.subcategory.selectSubcategory')}}",
            type:"POST",
            data:{'catId':catId},
            dataType:'json',
            success:function(data){
                console.log(data);
                $('#subcategory').empty();
                $.each(data,function(index,subcatObj){

                    $("#subcategory").append('<option value ="'+subcatObj.id+'">'+subcatObj.name+'</option>');
                });

            },
            error:function(){
                alert("error ase");
            }
         });
     //endajax
 });
    });
</script>
@endsection
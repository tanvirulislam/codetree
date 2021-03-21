@extends('backend.master.master')

@section('title')
Choose Create - Admin Panel
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
                <h4 class="page-title pull-left">Choose Create</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.choose') }}">All Choose</a></li>
                    <li><span>Create Choose</span></li>
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
                    <h4 class="header-title">Add Choose Info</h4>
                   
                    
                    <form action="{{ route('admin.choose.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        
<div class="row">
   
                         

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Header Title</label>
                <input type="text" class="form-control" name="htitle" placeholder="Header Title" value="{{ $banners->htitle }}">
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
                            
<div class="col-md-6">
                              
                                <div class="form-group">
                                <label>Desctiption</label>

                                <textarea class="form-control" name="des">{{ $banners->des }}</textarea>

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
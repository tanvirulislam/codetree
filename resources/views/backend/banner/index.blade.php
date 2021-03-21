@extends('backend.master.master')
@section('title')
Banner
@endsection

@section('style')
<!-- Start datatable css -->
    
@endsection

@section('body')
  <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Logo</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="{{route('admin.dashboard')}}">DashBoard</a></li>
                                <li><span>All Banner</span></li>
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
                   <div class="col-3">
                    @if (Auth::guard('admin')->user()->can('banner.create'))
                    <a class="btn btn-primary" href="{{route('admin.banner.create')}}" role="button" >Add New Banner</a>
                    @endif
                   </div>
                    <div class="col-3">
                   </div>
                    <div class="col-3">
                   </div>
                    <div class="col-3">
                   </div> 
                </div>
               <div class="row">
                   <!-- Primary table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Banner List</h4>
                                <div class="data-tables datatable-primary">
                                  <div class="table-responsive">
                                    <table id="dataTable2" class="text-center">
                                        <thead class="text-capitalize">
                                           <tr>
                                     <th width="5%">Sl</th>
                                    <th width="10%">Title</th>
                                    <th width="10%">Description</th>
                                    <th width="10%">Button Title</th>
                                 <th width="10%">Link</th>
                                    <th width="15%">Action</th>
                                </tr>
                                        </thead>
                                        <tbody>
                                            <?php $counter=0;?>
              @foreach($banners as $product)
              <?php $counter++;
             
              ?>
              <tr>
                <td>{{$counter}}</td>
                <td>
                 {!!$product->title!!}
                  
                 
                </td>
                <td>{{$product->des}}</td>
              
               
                <td >
                  {{$product->btitle}}
                  </td>


                  <td >
                  {{$product->link}}
                  </td>
                
                <td>
                 

                   @if (Auth::guard('admin')->user()->can('banner.edit'))
                      <a class="btn btn-info"  style="font-size: 13px;cursor:pointer;" title="Edit" data-toggle="tooltip" href="{{route('admin.banner.edit',$product->id) }}"> <i class="fa fa-edit" ></i></a>
                                    @endif
@if (Auth::guard('admin')->user()->can('banner.delete'))
                                    <button  type="button" class="btn btn-danger text-light" onclick="deleteTag({{ $product->id}})" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></button>
                    <form id="delete-form-{{ $product->id }}" action="{{ route('admin.banner.delete',$product->id) }}" method="POST" style="display: none;">
                      @method('DELETE')
                                                    @csrf
                                                    
                                                </form>
                                       @endif
                                       
                </td>
              </tr>
              @endforeach          
                                        </tbody>
                                    </table>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Primary table end -->
               </div>
            </div>
           <!-- Modal -->
<div class="modal fade bd-example-modal-lg productModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-3 modal-data">

    </div>
  </div>
</div>
         <script type="text/javascript">
        function deleteTag(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script> 
    @section('scipts')
    
     @endsection
@endsection

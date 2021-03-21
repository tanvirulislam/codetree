@extends('backend.master.master')
@section('title')
Logo
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
                                <li><span>All Logo</span></li>
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
                    @if (Auth::guard('admin')->user()->can('logo.create'))
                    <a class="btn btn-primary" href="{{route('admin.logo.create')}}" role="button" >Add New Logo</a>
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
                                <h4 class="header-title">Logo List</h4>
                                <div class="data-tables datatable-primary">
                                  <div class="table-responsive">
                                    <table id="dataTable2" class="text-center">
                                        <thead class="text-capitalize">
                                           <tr>
                                     <th width="5%">Sl</th>
                                    <th width="10%">Image</th>
                                    <th width="10%">Name</th>
                                   
                                
                                 <th width="10%">Status</th>
                                 
                                    <th width="15%">Action</th>
                                </tr>
                                        </thead>
                                        <tbody>
                                            <?php $counter=0;?>
              @foreach($logos as $product)
              <?php $counter++;
             
              ?>
              <tr>
                <td>{{$counter}}</td>
                <td>
                  @if(!empty($product->image))
                  <img src="{{ asset('/')}}{{$product->image}}" alt="{{$product->name}}" class="img-rounded" style="width:35px;height:35px;">
                  @else
                  
                  <img src="{{asset('/')}}public/admin/assets/images/no.webp" alt="No-image" class="img-rounded" style="width:35px;height:35px;">
                  
                  @endif
                </td>
                <td>{{$product->name}}</td>
              
               
                <td >@if($product->status == 1)
                 Logo
                  @else
                Icon
                  @endif
                  </td>
                
                <td>
                 

                   @if (Auth::guard('admin')->user()->can('logo.edit'))
                                    <button class="btn btn-info  edit-product" data-productid="{{$product->id}}" style="font-size: 13px;cursor:pointer;" title="Edit" data-toggle="tooltip"> <i class="fa fa-edit" ></i></button>
                                    @endif
@if (Auth::guard('admin')->user()->can('logo.delete'))
                                    <button  type="button" class="btn btn-danger text-light" onclick="deleteTag({{ $product->id}})" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></button>
                    <form id="delete-form-{{ $product->id }}" action="{{ route('admin.logo.delete',$product->id) }}" method="POST" style="display: none;">
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

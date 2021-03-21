@extends('backend.master.master')
@section('title')
Address
@endsection

@section('style')
<!-- Start datatable css -->
    
@endsection

@section('body')
  <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Address</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="{{route('admin.dashboard')}}">DashBoard</a></li>
                                <li><span>Address</span></li>
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
                    @if (Auth::guard('admin')->user()->can('address.create'))
                    <a class="btn btn-primary" href="{{route('admin.address.create')}}" role="button" >Add Address </a>
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
                                <h4 class="header-title">Address List</h4>
                                <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase bg-info">
                                           <tr>
                                     <th width="5%">Sl</th>
                                    <th width="10%">Tittle</th>
                                    <th width="10%">Description</th>
                                    <th width="10%">Email</th>
                                    <th width="10%">Phone</th>
                                    <th width="10%">Address</th>
                                     <th width="10%">Google Map</th>
                                     <th width="10%">Term and Condition</th>
                                       <th width="10%">Location Link</th>
                                    <th width="15%">Action</th>
                                </tr>
                                        </thead>
                                        <tbody>
                                  @foreach ($choose as $category)
                               <tr>
                                <td>{{ $loop->index+1 }}</td>
                               <td>
                  {{$category->title}}
                </td>
                <td>{{$category->des}}</td>
                 <td>{{$category->email}}</td>
                 <td>{{$category->phone}}</td>
                    <td>{{$category->add}}</td>
             
                   <td>
                    <iframe src=" {{$category->loaction}}" width="100" height="150" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                   


                  </td>
                <td>{{$category->term}}</td>
                <td>{{$category->locationlink}}</td>
                        
                        
              
                                   <td>
                               @if (Auth::guard('admin')->user()->can('address.edit'))
                                    <a class="btn btn-info text-white" href="{{ route('admin.address.edit',$category->id) }}" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                                    @endif
@if (Auth::guard('admin')->user()->can('address.delete'))
                                    <button  type="button" class="btn btn-danger text-light" onclick="deleteTag({{ $category->id}})" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></button>
                    <form id="delete-form-{{ $category->id }}" action="{{ route('admin.address.delete',$category->id) }}" method="POST" style="display: none;">
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
                    <!-- Primary table end -->
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
@endsection

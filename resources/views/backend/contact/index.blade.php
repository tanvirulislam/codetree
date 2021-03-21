@extends('backend.master.master')
@section('title')
Message
@endsection

@section('style')
<!-- Start datatable css -->
    
@endsection

@section('body')
  <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Message</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="{{route('admin.dashboard')}}">DashBoard</a></li>
                                <li><span>All Message</span></li>
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
                   <!-- Primary table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Message List</h4>
                                <div class="data-tables datatable-primary">
                                    <table id="dataTable2" class="text-center">
                                        <thead class="text-capitalize">
                                           <tr>
                                     <th width="5%">Sl</th>
                                    <th width="10%">Name</th>
                                    <th width="10%">Email</th>
                                    <th width="10%">Phone</th>
                                    <th width="10%">Meaasge</th>
                                    <th width="15%">Action</th>
                                </tr>
                                        </thead>
                                        <tbody>
                                                      @foreach ($choose as $category)
                               <tr>
                                <td>{{ $loop->index+1 }}</td>
                              
                <td>{{$category->name}}</td>
                <td>{{$category->email}}</td>
                <td>{{$category->phone}}</td>
                 <td>{{$category->des}}</td>
               
                
                                   <td>
                              
@if (Auth::guard('admin')->user()->can('contact.delete'))
                                    <button  type="button" class="btn btn-danger text-light" onclick="deleteTag({{ $category->id}})" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></button>
                    <form id="delete-form-{{ $category->id }}" action="{{ route('admin.contact.delete',$category->id) }}" method="POST" style="display: none;">
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

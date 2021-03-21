@extends('backend.master.master')
@section('title')
Team
@endsection

@section('style')
<!-- Start datatable css -->
    
@endsection

@section('body')
  <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Team</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="{{route('admin.dashboard')}}">DashBoard</a></li>
                                <li><span>All Team</span></li>
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
                    @if (Auth::guard('admin')->user()->can('team.create'))
                    <a class="btn btn-primary" href="{{route('admin.team.create')}}" role="button" >Add Team Member </a>
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
                                <h4 class="header-title">Team List</h4>
                                <div class="data-tables datatable-primary">
                                    <table id="dataTable2" class="text-center">
                                        <thead class="text-capitalize">
                                           <tr>
                                     <th width="5%">Sl</th>
                                    <th width="10%">Image</th>
                                    <th width="10%">Name</th>
                                    <th width="10%">Tittle</th>
                                    <th width="10%">Type</th>
                                    <th width="15%">Action</th>
                                </tr>
                                        </thead>
                                        <tbody>
                                  @foreach ($categories as $category)
                               <tr>
                                <td>{{ $loop->index+1 }}</td>
                               <td>
                  @if(!empty($category->image))
                  <img src="{{ asset('/')}}{{$category->image}}" alt="No-image" class="img-rounded" style="width:35px;height:35px;">
                  @else
                  
                  <img src="{{asset('/')}}public/admin/assets/images/no.webp" alt="No-image" class="img-rounded" style="width:35px;height:35px;">
                  
                  @endif
                </td>
                <td>{{$category->name}}</td>
                 <td>{{$category->title}}</td>
                <td>
                        
                        @if($category->type == 1)
                            Adviser
                   
                           @else
                                   Team Member
                           
                           @endif

                </td>
              
                                   <td>
                               @if (Auth::guard('admin')->user()->can('team.edit'))
                                    <a class="btn btn-info text-white" href="{{ route('admin.team.edit',$category->id) }}" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                                    @endif
@if (Auth::guard('admin')->user()->can('team.delete'))
                                    <button  type="button" class="btn btn-danger text-light" onclick="deleteTag({{ $category->id}})" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></button>
                    <form id="delete-form-{{ $category->id }}" action="{{ route('admin.team.delete',$category->id) }}" method="POST" style="display: none;">
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

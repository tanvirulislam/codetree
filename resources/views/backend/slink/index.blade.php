@extends('backend.master.master')
@section('title')
Social Link
@endsection

@section('style')
<!-- Start datatable css -->
    
@endsection

@section('body')
  <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Social Link</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="{{route('admin.dashboard')}}">DashBoard</a></li>
                                <li><span>All Social Link</span></li>
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
                    <a class="btn btn-primary" href="{{route('admin.team_social_link.create')}}" role="button" >Add Social Link </a>
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
                                <h4 class="header-title">Social Link List</h4>
                                <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase bg-info">
                                                <tr class="text-white">
                                                    <th>Sl</th>
                                    <th >Name</th>
                                    <th >Facebook</th>
                                    <th >Instagram</th>
                                    <th >LinkedIn</th>
                                    <th >Youtube</th>
                                    <th >Github</th>
                                    <th >Pinterest</th>
                                    <th >Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($categories as $social)
                               <tr>
                                <td>{{ $loop->index+1 }}</td>
                               <td>
                  {{ $social->user_name }}
                </td>
                <td>{{ $social->f_link }}</td>
                 <td>{{ $social->ins_link }}</td>
               <td>{{ $social->linkin_link }}</td>
                              <td> {{ $social->you_link }}</td>
                              <td>{{ $social->git_link }}</td>
                             <td>{{ $social->pin_link }}</td>
              
                                   <td>
                               @if (Auth::guard('admin')->user()->can('team.edit'))
                                    <a class="btn btn-info text-white" href="{{ route('admin.team_social_link.edit',$social->id) }}" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                                    @endif
@if (Auth::guard('admin')->user()->can('team.delete'))
                                    <button  type="button" class="btn btn-danger text-light" onclick="deleteTag({{ $social->id}})" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></button>
                    <form id="delete-form-{{ $social->id }}" action="{{ route('admin.team_social_link.delete',$social->id) }}" method="POST" style="display: none;">
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

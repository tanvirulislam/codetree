@extends('backend.master.master')
@section('title')
Roles
@endsection

@section('style')
<!-- Start datatable css -->
    
@endsection

@section('body')
  <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Roles</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="{{route('admin.dashboard')}}">DashBoard</a></li>
                                <li><span>All Roles</span></li>
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
                    @if (Auth::guard('admin')->user()->can('role.create'))
                    <a class="btn btn-primary" href="{{route('admin.roles.create')}}" role="button" >Create New Role</a>
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
                                <h4 class="header-title">Role List</h4>
                                <div class="data-tables datatable-primary">
                                    <table id="dataTable2" class="text-center">
                                        <thead class="text-capitalize">
                                           <tr>
                                     <th width="5%">Sl</th>
                                    <th width="10%">Name</th>
                                    <th width="60%">Permissions</th>
                                    <th width="15%">Action</th>
                                </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $role)
                               <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach ($role->permissions as $perm)
                                            <span class="badge badge-info mr-1">
                                                {{ $perm->name }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td>
                                         @if (Auth::guard('admin')->user()->can('role.edit'))
                                       <a class="btn btn-success text-white" href="{{ route('admin.roles.edit', $role->id) }}" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                                          @endif

                                          @if (Auth::guard('admin')->user()->can('role.delete'))
                                        <a class="btn btn-danger text-white" href="{{ route('admin.roles.delete', $role->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();" data-toggle="tooltip" title="Delete">
                                           <i class="fa fa-trash"></i>
                                        </a>

                                        <form id="delete-form-{{ $role->id }}" action="{{ route('admin.roles.delete', $role->id) }}" method="POST" style="display: none;">
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
            
@endsection
@section('scipts')
    
@endsection
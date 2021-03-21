@extends('backend.master.master')
@section('title')
Permission
@endsection

@section('style')
<!-- Start datatable css -->
    
@endsection

@section('body')
  <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Permission</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="{{route('admin.dashboard')}}">DashBoard</a></li>
                                <li><span>All Permission</span></li>
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
                    @if (Auth::guard('admin')->user()->can('permission.create'))
                    <a class="btn btn-primary" href="{{route('admin.permission.create')}}" role="button" >Create New Permission</a>
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
                                <h4 class="header-title">Permission List</h4>
                                <div class="data-tables datatable-primary">
                                    <table id="dataTable2" class="text-center">
                                        <thead class="text-capitalize">
                                           <tr>
                                     <th width="5%">Sl</th>
                                    <th width="10%">Group Name</th>
                                    
                                    <th width="15%">Action</th>
                                </tr>
                                        </thead>
                                        <tbody>
                                                      @foreach ($pers as $permission)
                               <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $permission->group_name}}</td>
                                   <td>
                                    <a class="btn btn-success text-white" href="{{ route('admin.permission.view', $permission->group_name) }}" data-toggle="tooltip" title="View"><i class="fa fa-folder-open-o"></i></a>

                                     


                                
                                       
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

@extends('backend.master.master')

@section('title')
Admin - Admin Panel
@endsection

@section('style')
    <!-- Start datatable css -->
   
@endsection


@section('body')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Admin</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>All Admin</span></li>
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
                    <h4 class="header-title float-left">Admin List</h4>
                    <p class="float-right mb-2">
                        <a class="btn btn-primary text-white" href="{{ route('admin.admins.create') }}">Create New Admin</a>
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                                                <table  class="table table-bordered text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="5%">Sl</th>
                                    <th width="10%">Name</th>
                                    <th width="10%">Email</th>
                                    <th width="40%">Roles</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($admins as $user)
                               <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            <span class="badge badge-info mr-1">
                                                {{ $role->name }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a class="btn btn-success text-white" href="{{ route('admin.admins.edit', $user->id) }}" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil-square-o"></i></a>

                                        <a class="btn btn-danger text-white" href="{{ route('admin.admins.delete', $user->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();" data-toggle="tooltip" title="Delete">
                                           <i class="fa fa-trash"></i>
                                        </a>

                                        <form id="delete-form-{{ $user->id }}" action="{{ route('admin.admins.delete', $user->id) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>
@endsection


@section('scipts')
   
@endsection
@extends('admin.admin_master')
@section('admin')

@section('title') {{'Roles All'}} @endsection

    <div class="page-content">
        <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Roles All</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('role.create') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> Add Role </i></a> <br>  <br>               
                        <h4 class="card-title">Roles All Data </h4>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th> 
                                    <th>Permissions</th> 
                                    <th>Action</th> 
                                </thead>
                                <tbody> 
                                    @foreach ($roles as $role)
                                    <tr>
                                         <td>{{ $loop->index+1 }}</td>
                                         <td>{{ $role->name }}</td>
                                         <td>
                                             @foreach ($role->permissions as $perm)
                                                 <span class="mr-1 badge badge-info">
                                                     {{ $perm->name }}
                                                 </span>
                                             @endforeach
                                         </td>
                                         <td>
                                             @if (Auth::guard('web')->user()->can('admin.edit'))
                                                 <a class="btn btn-success" href="{{ route('role.edit', $role->id) }}">Edit</a>
                                             @endif
     
                                             @if (Auth::guard('web')->user()->can('admin.edit'))
                                                 <a class="btn btn-danger" href="{{ route('role.destroy', $role->id) }}"
                                                 onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">
                                                     Delete
                                                 </a>
     
                                                 <form id="delete-form-{{ $role->id }}" action="{{ route('role.destroy', $role->id) }}" method="POST" style="display: none;">
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
                    </div> <!-- end col -->
                </div> <!-- end row -->   
        </div> <!-- container-fluid -->
    </div>
@endsection
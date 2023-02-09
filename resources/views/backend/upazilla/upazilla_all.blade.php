@extends('admin.admin_master')

@section('admin')
@section('title'){{'All Upazilla'}} @endsection

 <div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Upazilla All</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->                  
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                                <a href="{{ route('upazilla.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> Add Upazilla </i></a> <br>  <br>               
                                <h4 class="card-title">Upazilla All Data </h4>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
											<th>Division Name</th> 
											 <th>District Name</th> 
                                            <th>Upazilla Name</th> 
                                            <th>Name Bangla</th> 
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($upazillas as $key => $item)
                                            <tr>
                                                <td> {{ $key+1}} </td>
												<td> {{ $item['division']['name']  }}  </td> 
												<td> {{ $item['district']['name']  }}  </td> 
                                                <td> {{ $item->name }} </td> 
                                                <td> {{ $item->name_bn }} </td> 
                                                <td>
                                                    <a href="{{ route('upazilla.edit',$item->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                                    <a href="{{ route('upazilla.delete',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
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
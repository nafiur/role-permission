@extends('admin.admin_master')
@section('admin')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 @section('title'){{'Edit Branch'}} @endsection
<div class="page-content">
    <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('branch.all') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> Back </i></a> <br>  <br>
                            <h4 class="card-title">Branch Edit</h4><br><br>
                            <form method="post" action="{{ route('branch.update') }}" id="myForm" >
                                @csrf
                                <input type="hidden" name="id" value="{{ $branch->id }}">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Domain Name </label>
                                    <div class="col-sm-10">
                                        <select name="domain_id" class="form-select" aria-label="Default select example">
                                            <option selected="">Open this select menu</option>
                                            @foreach($domain as $doma)
                                                <option value="{{ $doma->id }}" {{ $doma->id == $branch->domain_id ? 'selected' : '' }}   >{{ $doma->name }}</option>
                                            @endforeach
                                            </select>
                                    </div>
                                </div>
                              <!-- end row -->

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Zone Name </label>
                                    <div class="col-sm-10">
                                        <select name="zone_id" class="form-select" aria-label="Default select example">
                                            <option selected="">Open this select menu</option>
                                            @foreach($zone as $zone)
                                            <option value="{{ $zone->id }}" {{ $zone->id == $branch->zone_id ? 'selected' : '' }}   >{{ $zone->name }}</option>
                                           @endforeach
                                            </select>
                                    </div>
                                </div>
                              <!-- end row -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Area Name </label>
                                    <div class="col-sm-10">
                                        <select name="area_id" class="form-select" aria-label="Default select example">
                                            <option selected="">Open this select menu</option>
                                            @foreach($area as $area)
                                            <option value="{{ $area->id }}" {{ $area->id == $branch->area_id ? 'selected' : '' }}   >{{ $area->name }}</option>
                                           @endforeach
                                            </select>
                                    </div>
                                </div>
                              <!-- end row -->


                              <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Branch Name </label>
                                <div class="form-group col-sm-10">
                                    <input name="name" class="form-control" value="{{ $branch->name }}" type="text">
                                </div>
                            </div>
                            <!-- end row -->
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Branch">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                }, 
                domain_id: {
                    required : true,
                }, 
                zone_id: {
                    required : true,
                }, 
                area_id: {
                    required : true,
                }, 
            },
            messages :{
                name: {
                    required : 'Please Enter Upazilla Name',
                },
                domain_id: {
                    required : 'Please Enter Domain Name',
                },
                zone_id: {
                    required : 'Please Enter Zone Name',
                },
                area_id: {
                    required : 'Please Enter Zone Name',
                },
                
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>


 
@endsection 

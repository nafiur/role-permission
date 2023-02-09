@extends('admin.admin_master')
@section('admin')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 @section('title'){{'Edit Zone Info'}} @endsection
<div class="page-content">
    <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('zone.all') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> Back </i></a> <br>  <br>
                            <h4 class="card-title">Zone Edit</h4><br><br>
                            <form method="post" action="{{ route('zone.update') }}" id="myForm" >
                                @csrf
                                <input type="hidden" name="id" value="{{ $zone->id }}">

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Domain Name </label>
                                    <div class="col-sm-10">
                                        <select name="domain_id" class="form-select" aria-label="Default select example">
                                            <option selected="">Open this select menu</option>
                                            @foreach($domain as $domain)
                                            <option value="{{ $domain->id }}" {{ $domain->id == $zone->domain_id ? 'selected' : '' }}   >{{ $domain->name }}</option>
                                           @endforeach
                                            </select>
                                    </div>
                                </div>
                              <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Zone Name </label>
                                    <div class="form-group col-sm-10">
                                        <input name="name" class="form-control" value="{{ $zone->name }}" type="text">
                                    </div>
                                </div>
                                <!-- end row -->
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Zone">
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

            },
            messages :{
                name: {
                    required : 'Please Enter Your Name',
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

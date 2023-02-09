@extends('admin.admin_master')
@section('admin')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 @section('title'){{'Edit Religion'}} @endsection
<div class="page-content">
    <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('religion.all') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> Back </i></a> <br>  <br>
                            <h4 class="card-title">Religion Information Edit</h4><br><br>
                            <form method="post" action="{{ route('religion.update') }}" id="myForm" >
                                @csrf
                                <input type="hidden" name="id" value="{{ $religion->id }}">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Religion Name </label>
                                    <div class="form-group col-sm-10">
                                        <input name="name" class="form-control" value="{{ $religion->name }}" type="text">
                                    </div>
                                </div>
                                <!-- end row -->
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Religion">
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
                    required : 'Please Enter Religion',
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

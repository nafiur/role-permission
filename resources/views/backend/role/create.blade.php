@extends('admin.admin_master')
@section('admin')
@section('title') {{'Add Role'}} @endsection
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Add New Role </h4><br><br>
            <form action="{{ route('role.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Role Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter a Role Name">
                </div>

                <div class="form-group">
                    <label for="name">Permissions</label>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1">
                        <label class="form-check-label" for="checkPermissionAll">All</label>
                    </div>
                    <hr>
                    @php $i = 1; @endphp
                    @foreach ($permission_groups as $group)
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                    <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                </div>
                            </div>

                            <div class="col-9 role-{{ $i }}-management-checkbox">
                                @php
                                    $permissions = App\Models\User::getpermissionsByGroupName($group->name);
                                    $j = 1;
                                @endphp
                                @foreach ($permissions as $permission)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                        <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                    @php  $j++; @endphp
                                @endforeach
                                <br>
                            </div>

                        </div>
                        @php  $i++; @endphp
                    @endforeach

                    
                </div>
               
                
                <button type="submit" class="pl-4 pr-4 mt-4 btn btn-primary">Save Role</button>
            </form>
            {{-- <form method="post" action="{{ route('role.store') }}" id="myForm" >
                @csrf
            <div class="mb-3 row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Role Name </label>
                <div class="form-group col-sm-10">
                    <input name="name" class="form-control" type="text"    >
                </div>
            </div>
            <!-- end row -->
            <div class="mb-3 row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Permission </label>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Select All </label>
                    <hr>
                    <div class="form-group col-sm-10">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1">
                            <label class="form-check-label" for="checkPermissionAll">Select All</label>
                        </div>
                        <div class="form-group col-sm-10">
                            @foreach ($permissions as $permission)
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> --}}
            <!-- end row -->
            {{-- @foreach ($permissions as $permission)
            <div class="mb-3 row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Check Permission </label>
                <div class="form-group col-sm-10">
                    <input class="form-check-input" type="checkbox" id="formCheck1" value="{{ $permission->name }}">
                </div>
                
            </div>
            @endforeach --}}
            <!-- end row -->
            {{-- <input type="submit" class="btn btn-info waves-effect waves-light" value="Save">
            </form> --}}
             
           
           
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
                //  mobile_no: {
                //     required : true,
                // },
                //  email: {
                //     required : true,
                // },
                //  address: {
                //     required : true,
                // },
            },
            messages :{
                name: {
                    required : 'Please Enter Role Name',
                // },
                // mobile_no: {
                //     required : 'Please Enter Your Mobile Number',
                // },
                // email: {
                //     required : 'Please Enter Your Email',
                // },
                // address: {
                //     required : 'Please Enter Your Address',
                // },
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

<script>
    /**
         * Check all the permissions
         */
         $("#checkPermissionAll").click(function(){
             if($(this).is(':checked')){
                 // check all the checkbox
                 $('input[type=checkbox]').prop('checked', true);
             }else{
                 // un check all the checkbox
                 $('input[type=checkbox]').prop('checked', false);
             }
         });

         function checkPermissionByGroup(className, checkThis){
            const groupIdName = $("#"+checkThis.id);
            const classCheckBox = $('.'+className+' input');

            if(groupIdName.is(':checked')){
                 classCheckBox.prop('checked', true);
             }else{
                 classCheckBox.prop('checked', false);
             }
            implementAllChecked();
         }

         function checkSinglePermission(groupClassName, groupID, countTotalPermission) {
            const classCheckbox = $('.'+groupClassName+ ' input');
            const groupIDCheckBox = $("#"+groupID);

            // if there is any occurance where something is not selected then make selected = false
            if($('.'+groupClassName+ ' input:checked').length == countTotalPermission){
                groupIDCheckBox.prop('checked', true);
            }else{
                groupIDCheckBox.prop('checked', false);
            }
            implementAllChecked();
         }

         function implementAllChecked() {
             const countPermissions = {{ count($all_permissions) }};
             const countPermissionGroups = {{ count($permission_groups) }};

            //  console.log((countPermissions + countPermissionGroups));
            //  console.log($('input[type="checkbox"]:checked').length);

             if($('input[type="checkbox"]:checked').length >= (countPermissions + countPermissionGroups)){
                $("#checkPermissionAll").prop('checked', true);
            }else{
                $("#checkPermissionAll").prop('checked', false);
            }
         }


</script>


 
@endsection 

 <div class="vertical-menu">

                <div data-simplebar class="h-100">
                    @php
                    $id = Auth::user()->id;
                    $adminData = App\Models\User::find($id);
                    @endphp
                    <!-- User details -->
                    <div class="user-profile text-center mt-3">
                        <div class="">
                            <img src="{{ (!empty($adminData->profile_image))? url('upload/admin_images/'.$adminData->profile_image):url('upload/no_image.jpg') }}" alt="" class="avatar-md rounded-circle">
                        </div>
                        <div class="mt-3">
                            <h4 class="font-size-16 mb-1">{{ $adminData->name }}</h4>
                            <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
                        </div>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="{{ url('/dashboard') }}" class="waves-effect">
                                    <i class="ri-home-fill"></i> 
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-hotel-fill"></i>
                                    <span>Setup/Config</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('sector.all') }}">Sector Setup</a></li>
                                    <li><a href="{{ route('domain.all') }}">Domain Setup</a></li>
                                    <li><a href="{{ route('designation.all') }}">Designation Setup</a></li>
                                    <li><a href="{{ route('division.all') }}">Division Setup</a></li>
                                    <li><a href="{{ route('district.all') }}">District Setup</a></li>
                                    <li><a href="{{ route('upazilla.all') }}">Upazilla Setup</a></li>
                                    <li><a href="{{ route('bloodgroup.all') }}">Blood Group Setup</a></li>
                                    <li><a href="{{ route('department.all') }}">Department Setup</a></li>
                                    <li><a href="{{ route('educationalqualification.all') }}">Edu Qualification</a></li>
                                    <li><a href="{{ route('employeetype.all') }}">Employee Type</a></li>
                                    <li><a href="{{ route('gender.all') }}">Gender Type</a></li>
                                    <li><a href="{{ route('jobstatus.all') }}">Job Status</a></li>
                                    <li><a href="{{ route('maritalstatus.all') }}">Marital Status</a></li>
                                    <li><a href="{{ route('religion.all') }}">Religion Type</a></li>
                                    <li><a href="{{ route('zone.all') }}">Zone Type</a></li>
                                    <li><a href="{{ route('area.all') }}">Area Type</a></li>
                                    <li><a href="{{ route('branch.all') }}">Branch Type</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('newemployee.all') }}" class="waves-effect">
                                    <i class="ri-shield-user-fill"></i> 
                                    <span>New Employee Info</span>
                                </a>
                            </li>
 
        {{-- <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-hotel-fill"></i>
                <span>New Employee Info</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('newemployee.all') }}">All New Employee</a></li>
               
            </ul>
        </li> --}}


        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-shield-user-fill"></i>
                <span>Manage Customers</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('customer.all') }}">All Customers</a></li>
                 <li><a href="{{ route('credit.customer') }}">Credit Customers</a></li>

                 <li><a href="{{ route('paid.customer') }}">Paid Customers</a></li>
                  <li><a href="{{ route('customer.wise.report') }}">Customer Wise Report</a></li>
               
            </ul>
        </li>


         <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-delete-back-fill"></i>
                <span>Manage Units</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('unit.all') }}">All Unit</a></li>
               
            </ul>
        </li>

         <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-apps-2-fill"></i>
                <span>Manage Category</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('category.all') }}">All Category</a></li>
               
            </ul>
        </li>


          <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-reddit-fill"></i>
                <span>Manage Product</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('product.all') }}">All Product</a></li>
               
            </ul>
        </li>


          <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-oil-fill"></i>
                <span>Manage Purchase</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('purchase.all') }}">All Purchase</a></li>
                <li><a href="{{ route('purchase.pending') }}">Approval Purchase</a></li>
                <li><a href="{{ route('daily.purchase.report') }}">Daily Purchase Report</a></li>
               
            </ul>
        </li>


          <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-compass-2-fill"></i>
                <span>Manage Invoice</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('invoice.all') }}">All Invoice</a></li>
                <li><a href="{{ route('invoice.pending.list') }}">Approval Invoice</a></li>
                <li><a href="{{ route('print.invoice.list') }}">Print Invoice List</a></li>
                  <li><a href="{{ route('daily.invoice.report') }}">Daily Invoice Report</a></li>
               
            </ul>
        </li>

                             





                            <li class="menu-title">Stock</li>

    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="ri-gift-fill"></i>
            <span>Manage Stock</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('stock.report') }}">Stock Report</a></li>
            <li><a href="{{ route('stock.supplier.wise') }}">Supplier / Product Wise </a></li>
            
        </ul>
    </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-profile-line"></i>
                                    <span>Support</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="pages-starter.html">Starter Page</a></li>
                                    <li><a href="pages-timeline.html">Timeline</a></li>
                                    <li><a href="pages-directory.html">Directory</a></li>
                                    <li><a href="pages-invoice.html">Invoice</a></li>
                                    <li><a href="pages-404.html">Error 404</a></li>
                                    <li><a href="pages-500.html">Error 500</a></li>
                                </ul>
                            </li>

                           

                            
                         

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
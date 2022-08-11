<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{url('admin/home')}}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span
                            class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-file-user-fill"></i>
                        <span>Teacher </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('admin/teacher-list')}}">Teacher List</a></li>
                        <li><a href="{{url('admin/teacher-list-search')}}">Search Teacher List</a></li>
                    </ul>
                </li> --}}
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-database-2-fill"></i>
                        <span>Data </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('admin/data-list')}}">Data List</a></li>
                        <li><a href="{{url('admin/work-completed-request')}}">Work Completed Request</a></li>
                    </ul>
                </li> --}}
                
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-user-2-fill"></i>
                        <span>User</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('admin/farmer-list')}}">Farmer List</a></li>
                        <li><a href="{{url('admin/agri-retailer-list')}}">Agri Retailer List</a></li>
                        <li><a href="{{url('admin/cattle-doctor-list')}}">Cattle Doctor</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-shield-user-fill"></i>
                        <span>Employee</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('admin/add-employee')}}">Add Employee</a></li>
                        <li><a href="{{url('admin/employee-list')}}">Employee List</a></li>
                        {{-- <li><a href="{{url('admin/view-employee')}}">View Employee</a></li> --}}
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-shield-fill"></i>
                        <span>Insurance</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('admin/crop-insurance')}}">Crop Insurance</a></li>
                        <li><a href="{{url('admin/cattle-insurance')}}">Cattle Insurance</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-edit-box-fill"></i>
                        <span>Manage</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('admin/district-list')}}">District List</a></li>
                        <li><a href="{{url('admin/block-list')}}">Block List</a></li>
                    </ul>
                </li>
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-image-line"></i>
                        <span>Gallery</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{url('admin/add-gallery')}}">Add Gallery</a></li>
                        <li><a href="{{url('admin/gallery-list')}}">Gallery List</a>
                        </li>
                    </ul>
                 </li>
                 <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-notification-2-fill"></i>
                        <span>Notice</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{url('admin/add-notice')}}">Add Notice</a></li>
                        <li><a href="{{url('admin/notice-list')}}">Notice List</a>
                        </li>
                    </ul>
                 </li>
                 <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-phone-fill"></i>
                        <span>Enquiry</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{url('admin/enquiry-list')}}">Enquiry List</a></li>
                        <li><a href="{{url('admin/emailsubscription-list')}}">Email Subscription</a>
                        </li>
                    </ul>
                 </li> --}}
                 <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-money-dollar-circle-fill"></i>
                        <span>Payment Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{url('admin/fix-amount')}}">Fix Insurance Amount</a></li>
                        
                    </ul>
                 </li>
                 <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-add-line"></i>
                        <span>Loan Request</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{url('admin/kisan-loan')}}">Kisan Loan</a></li>
                        
                    </ul>
                 </li>
                 {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-calendar-event-fill"></i>
                        <span>Event</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{url('admin/add-event')}}">Add Event</a></li>
                        <li><a href="{{url('admin/event-list')}}">Event List</a>
                        </li>
                    </ul>
                 </li>
                 
                 <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Authentication</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="javascript:void(0)">Recover Password</a></li>
                    </ul>
                </li> --}}
               
                {{-- <li class="menu-title">Front Website</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('admin/update-logo')}}">Update Logo</a></li>
                        <li><a href="{{url('admin/contact-details')}}">Contact Details</a></li>
                        <li><a href="{{url('admin/social-media')}}">Social Media Links</a></li>
                        <li><a href="{{url('admin/add-slider')}}">Add Slider</a></li>
                        <li><a href="{{url('admin/slider-list')}}">Slider List</a></li>
                    </ul>
                </li> --}}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
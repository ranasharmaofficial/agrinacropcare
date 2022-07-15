<nav class="app-index navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <nav id="main-nav">
        <ul class="first-nav app-links">
            <li class="bg-red">
                <div class="ion-avatar ion-margin-start ios hydrated mb-2 md">
                    <img class="img-responsive img-circle" alt="{{$LoggedUserInfo->name}}" src="{{asset('uploads/students/'.$userinfo->studentPhoto)}}">
                </div>
                <h3 class="profile_title">{{$LoggedUserInfo->name}}</h3>
                <h4 class="profile_email">Class - {{$course->courseName}}</h4>
            </li>
            <li>
                <a href="{{url('dashboard/home')}}"> <i class="fa fa-home" aria-hidden="true"></i>Home</a>
            </li>
            <li>
                <a href="{{url('dashboard/announcements')}}"> <i class="fa fa-volume-up" aria-hidden="true"></i>Announcements</a>
            </li>
            <li>
                <a href="{{url('dashboard/events')}}"> <i class="fa fa-calendar" aria-hidden="true"></i>Events</a>
            </li>
            <li>
                <a href="{{url('dashboard/fees')}}"> <i class="fa fa-inr" aria-hidden="true"></i>Fees</a>
            </li>
            <li>
                <a href="{{url('dashboard/home')}}"> <i class="fa fa-address-card" aria-hidden="true"></i>Exam Report</a>
            </li>
            <li>
                <a href="{{url('dashboard/profile')}}"> <i class="fa fa-user-circle" aria-hidden="true"></i> My Profile</a>
            </li>
            <li>
                <a href="{{url('dashboard/home')}}"> <i class="fa fa-lock" aria-hidden="true"></i>Change Password</a>
            </li>
            <li>
                <a href="{{url('dashboard/home')}}"> <i class="fa fa-envelope" aria-hidden="true"></i>Support</a>
            </li>
            <li>
                <a href="{{url('dashboard/logout')}}"> <i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
            </li>
        </ul>
    </nav>
    <div class="osahan-nav">
        <div class="ion-toolbar">
            <a href="#" class="toggle">
                <i class="menu_icon">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </i>
            </a>
            <div class="dash-title">
                @yield('header-title')
            </div>
            <div class="ion-buttons top-cart-con">
                <a href="{{url('dashboard/notification')}}" class="ion-button top-cart">
                    <div class="ion-badge">
                        {{$count_announcements;}}
                    </div>
                    <i class="menu_icon">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                    </i>
                </a>
            </div>
        </div>
    </div>
</nav>

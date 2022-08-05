@php
$logged_id = Session::get('LoggedDash');
$logged_name = \App\Models\User::where('id',$logged_id)->first();
@endphp
<nav class="app-index navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <nav id="main-nav">
        <ul class="first-nav app-links">
        @if($logged_id!=null)
            <li class="bg-teal">
                <div class="ion-avatar ion-margin-start ios hydrated mb-2 md">
                    <img class="img-responsive img-circle" alt="" src="{{asset('assets_dash/icon/man.png')}}">
                </div>
                
                <h3 class="profile_title">{{$logged_name->name}}</h3>
                <h4 class="profile_email">{{$logged_name->user_id}}</h4>
            </li>
        @else
            <li class="bg-teal">
                <div class="ion-avatar ion-margin-start ios hydrated mb-2 md">
                    <img class="img-responsive img-circle" alt="" src="{{asset('assets_dash/icon/man.png')}}">
                </div>
                
                <h3 class="profile_title">Welcome, Guest</h3>
                
            </li>
        @endif
            <li>
                <a href="{{url('dashboard/home')}}"> <i class="fa fa-home" aria-hidden="true"></i>Home</a>
            </li>
            <li>
                <a href="{{url('dashboard/home')}}"> <i class="fa fa-volume-up" aria-hidden="true"></i>Announcements</a>
            </li>
            <li>
                <a href="{{url('dashboard/home')}}"> <i class="fa fa-calendar" aria-hidden="true"></i>Events</a>
            </li>
            <li>
                <a href="{{url('dashboard/crop-care')}}"> <i class="fa fa-file-text-o" aria-hidden="true"></i>Crop Care</a>
            </li>
            <li>
                <a href="{{url('dashboard/home')}}"> <i class="fa fa-medkit" aria-hidden="true"></i>Animal Health Care</a>
            </li>
            <li>
                <a href="{{url('dashboard/home')}}"> <i class="fa fa-industry" aria-hidden="true"></i>Insurance</a>
            </li>
            <li>
                <a href="{{url('dashboard/support')}}"> <i class="fa fa-envelope" aria-hidden="true"></i>Support</a>
            </li>
			@if($logged_id!=null)
            <li>
                <a href="{{url('dashboard/logout')}}"> <i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
            </li>
			@endif
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
                <a href="#" class="ion-button top-cart">
                    <div class="ion-badge">
                        {{-- {{$count_announcements;}} --}}0
                    </div>
                    <i class="menu_icon">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                    </i>
                </a>
            </div>
        </div>
    </div>
</nav>

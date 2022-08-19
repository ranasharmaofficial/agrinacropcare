@php
$logged_id = Session::get('LoggedDash');
$logged_name = \App\Models\User::where('id',$logged_id)->first();
@endphp

<!-- menu main -->
<div class="main-menu">
    <div class="row mb-4 no-gutters">
        <div class="col-auto"><button class="btn btn-link btn-40 btn-close text-white"><span class="material-icons">chevron_left</span></button></div>
        <div class="col-auto">
            <div class="avatar avatar-40 rounded-circle position-relative">
                <figure class="background">
                    <img src="img/user1.png" alt="">
                </figure>
            </div>
        </div>
        <div class="col pl-3 text-left align-self-center">
            <h6 class="mb-1">Errica Johnson</h6>
            <p class="small text-default-secondary">London, UK</p>
        </div>
    </div>
    <div class="menu-container">
        <div class="row mb-4">
            <div class="col">
                <h4 class="mb-1 font-weight-normal">$ 1548.00</h4>
                <p class="text-default-secondary">My Balance</p>
            </div>
            <div class="col-auto">
                <button class="btn btn-default btn-40 rounded-circle" data-toggle="modal" data-target="#addmoney"><i class="material-icons">add</i></button>
            </div>
        </div>

        <ul class="nav nav-pills flex-column ">
            <li class="nav-item">
                <a class="nav-link active" href="index.html">
                    <div>
                        <span class="material-icons icon">account_balance</span>
                        Home
                    </div>
                    <span class="arrow material-icons">chevron_right</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="analytics.html">
                    <div>
                        <span class="material-icons icon">insert_chart</span>
                        Analytics
                    </div>
                    <span class="arrow material-icons">chevron_right</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="refer_friends.html">
                    <div>
                        <span class="material-icons icon">perm_contact_calendar</span>
                        Refer Friends
                    </div>
                    <span class="arrow material-icons">chevron_right</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gift_cards.html">
                    <div>
                        <span class="material-icons icon">card_giftcard</span>
                        Gift Cards
                    </div>
                    <span class="arrow material-icons">chevron_right</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="my_orders.html">
                    <div>
                        <span class="material-icons icon">shopping_bag</span>
                        My Orders
                    </div>
                    <span class="arrow material-icons">chevron_right</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="setting.html">
                    <div>
                        <span class="material-icons icon">settings</span>
                        Settings
                    </div>
                    <span class="arrow material-icons">chevron_right</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages.html">
                    <div>
                        <span class="material-icons icon">layers</span>
                        Pages
                    </div>
                    <span class="arrow material-icons">chevron_right</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="controls.html">
                    <div>
                        <span class="material-icons icon">widgets</span>
                        Controls
                    </div>
                    <span class="arrow material-icons">chevron_right</span>
                </a>
            </li>
        </ul>
        <div class="text-center">
            <a href="login.html" class="btn btn-outline-danger text-white rounded my-3 mx-auto">Sign out</a>
        </div>
    </div>
</div>
<div class="backdrop"></div>


{{-- <nav class="app-index navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <nav id="main-nav">
        <ul class="first-nav app-links">
        @if($logged_id!=null)
            <li class="bg-teal">
                <div class="ion-avatar ion-margin-start ios hydrated mb-2 md">
                    @if($logged_name->photo!=null)
                    <img class="img-responsive img-circle" alt="" src="{{asset('uploads/user').'/'.$logged_name->photo}}">
                    @else
                    <img class="img-responsive img-circle" alt="" src="{{asset('assets_dash/icon/man.png')}}">  
                    @endif
                </div>
                
                <h3 class="profile_title">{{$logged_name->name}}</h3>
                @if ($logged_name->role!=4)
                    <h3 class="profile_title">{{$logged_name->mobile}}</h3>
                @else
                <h4 class="profile_email">{{$logged_name->user_id}}</h4>
                @endif
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
            {{-- <li>
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
                <a href="{{url('dashboard/insurance')}}"> <i class="fa fa-industry" aria-hidden="true"></i>Insurance</a>
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
                        {{-- {{$count_announcements;}} -0
                    </div>
                    <i class="menu_icon">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                    </i>
                </a>
            </div>
        </div>
    </div>
</nav> --}}

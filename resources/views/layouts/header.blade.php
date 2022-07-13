<header id="header">
    <!-- header-top -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="header-info pull-left">
                        <li><i class="fa fa-phone" aria-hidden="true"></i> Phone: ++91 9191919191</li>
                        <li>
                            <a href="mailto:info@agrinacropcare.com"><i class="fa fa-envelope" aria-hidden="true"></i> info@agrinacropcare.com</a>
                        </li>
                        <li><i class="fa fa-clock-o" aria-hidden="true"></i> Mon-Fri: 7:00 - 18:00</li>
                    </ul>
                    <div class="pull-right">
                        <ul class="header-social social-icon">
                            <li>
                                <a class="facebook-color" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a class="twitter-color" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a class="google-color" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a class="instagram-color" href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-top end here -->

    <div class="header-main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-logo">
                        <a href="{{url('')}}">
                            <img src="{{url('front_assets/img/logo.png')}}" alt="logo">
                            <img class="logo-responsive" src="{{url('front_assets/img/logo.png')}}" alt="logo">
                            <img class="logo-sticky" src="{{url('front_assets/img/logo.png')}}" alt="logo">
                        </a>
                    </div>
                    <nav class="menu-container">
                        <ul id="menu" class="sm me-menu">
                            <li class="{{ set_active('/') }}">
                                <a href="{{url('')}}">Home</a>
                                
                            </li>
                            <li class="{{ set_active('about-us') }}">
                                <a href="{{url('about-us')}}">About Us</a>
                            </li>
                            <li>
                                <a href="#">Services</a>
                            </li>
                            <li>
                                <a href="#">Gallery</a>
                            </li>
                            <li>
                                <a href="#">Blogs</a>
                            </li>
                            
                            <li><a href="{{url('contact-us')}}">Contact Us</a></li>
                        </ul>
                        <div class="additional-menu">
                            <a class="search-btn" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                            <div class="search-panel">
                                <form action="#" class="form-search form-search-rounded">
                                    <div class="input-group-placeholder addon-right">
                                        <input name="search" type="text" class="form-control" placeholder="Search here..">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
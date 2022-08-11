<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-lg-3">
                <div class="footer-logo">
                    <a href="{{url('')}}">
                        <img src="{{url('front_assets/img/logo.png')}}" alt="Footer Logo">
                    </a>
                </div>
                <p>Agrina Crop Care, provides all you need about Garden and Landscape Design for get better garden decorations.</p>
            </div>

            <div class="col-md-3 col-lg-2">
                <h5 class="footer-title">Quick Links</h5>
                <ul class="me-list">
                    <li><a href="{{url('about-us')}}">About Us</a></li>
                    <li><a href="#">Our Project</a></li>
                    <li><a href="#">Term &amp; Conditions</a></li>
                    <li><a href="{{url('privacy-policy')}}">Privacy Policy</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

            <div class="col-md-4 col-lg-2">
                <h5 class="footer-title">Contact Us</h5>
                <p>
                    <strong>General Contact :</strong> <br>
                    <a class="text-color" href="mailto:info@agrinacropcare.com">info@agrinacropcare.com</a> <br>
                    
                </p>
            </div>

            <div class="col-md-12 col-lg-5">
                <h5 class="footer-title">Subscribe For Great Promo</h5>
                <p>Join with our subscribers and get special price,<br>free garden magazine, promo product announcements and much more!</p>

                <form class="subscribe-form">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter Email Address" aria-label="Enter Email Address" aria-describedby="button-subscribe">
                        <div class="input-group-append">
                            <button class="btn btn-default" type="button" id="button-subscribe">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="copyright pull-left">&copy; All rights reserved @php echo date('Y') @endphp, <strong>AGRINA CROP CARE PRIVATE LIMITED</strong> | <a href="http://ranasharma.com">Designed with <i class="fa fa-heart"></i> by WebFinic Enterprise</a></div>
                    <ul class="footer-social social-icon pull-right">
                        <li>
                            <a class="facebook-color" href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a class="twitter-color" href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a class="google-color" href="#"><i class="fa fa-google-plus"></i></a>
                        </li>
                        <li>
                            <a class="dribbble-color" href="#"><i class="fa fa-dribbble"></i></a>
                        </li>
                        <li>
                            <a class="linkedin-color" href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                        <li>
                            <a class="instagram-color" href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- javascript here -->
<script src="{{url('front_assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{url('front_assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('front_assets/js/jquery.smartmenus.min.js')}}"></script>
<script src="{{url('front_assets/js/jquery.waypoints.min.js')}}"></script>
<script src="{{url('front_assets/js/jquery.scrollUp.min.js')}}"></script>

<!-- javascript plugin -->
<script src="{{url('front_assets/js/jquery.flexslider-min.js')}}"></script>
<script src="{{url('front_assets/js/owl.carousel.min.js')}}"></script>
<script src="{{url('front_assets/js/jquery.countTo.js')}}"></script>
<script src="{{url('front_assets/js/jquery.parallax.js')}}"></script>
<script src="{{url('front_assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{url('front_assets/js/jquery.easypiechart.min.js')}}"></script>
<script src="{{url('front_assets/js/jquery.maps.js')}}"></script>

<!-- javascript configuration -->
<script src="{{url('front_assets/js/config.js')}}"></script>
<script>
    $(document).ready(function () {
        var map = new GMaps({
            el: "#map",
            lat: 40.776883,
            lng: -73.982504,
            zoom: 17,
            zoomControl: true,
            zoomControlOpt: {
                style: "SMALL",
                position: "TOP_LEFT",
            },
            panControl: false,
            streetViewControl: false,
            mapTypeControl: false,
            overviewMapControl: false,
            scrollwheel: false,
        });

        map.addMarker({
            lat: 40.776883,
            lng: -73.982504,
            icon: "img/map-marker.png",
        });

        var styles = [
            {
                featureType: "road",
                elementType: "geometry",
                stylers: [
                    {
                        lightness: 100,
                    },
                    {
                        visibility: "simplified",
                    },
                ],
            },
            {
                featureType: "road",
                elementType: "labels",
                stylers: [
                    {
                        visibility: "off",
                    },
                ],
            },
        ];

        map.addStyle({
            styledMapName: "Styled Map",
            styles: styles,
            mapTypeId: "map_style",
        });

        map.setStyle("map_style");
    });
</script>
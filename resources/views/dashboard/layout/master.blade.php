<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Rana Sharma">
    <meta name="theme-color" content="#003049">
	  <meta name="apple-mobile-web-app-capable" content="yes">
	  <meta name="apple-mobile-web-app-status-bar-style" content="default">
	  <meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: gap:">
      <title>@yield('title') - Agrina Crop Care</title>
      <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="manifest.json" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="img/favicon180.png" sizes="180x180">
    <link rel="icon" href="img/favicon32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="img/favicon16.png" sizes="16x16" type="image/png">

    <!-- Material icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&amp;display=swap" rel="stylesheet">

    <!-- swiper CSS -->
    <link href="{{asset('assets_dash/vendor/swiper/css/swiper.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('assets_dash/css/style.css')}}" rel="stylesheet" id="style">

      {{-- <script src="{{asset('assets_dash/owlcarousel/owl.carousel.js')}}"></script> --}}
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
      
   </head>
   <body class="body-scroll d-flex flex-column h-100 menu-overlay" data-page="homepage">
     <!-- screen loader -->
     <div class="container-fluid h-100 loader-display">
      <div class="row h-100">
          <div class="align-self-center col">
              <div class="logo-loading">
                  <div class="icon icon-100 mb-4 rounded-circle">
                      <img src="img/favicon144.png" alt="" class="w-100">
                  </div>
                  <h4 class="text-default">Agrina Crop Care</h4>
                  <p class="text-secondary">Mobile HTML template</p>
                  <div class="loader-ellipsis">
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
		@include('dashboard.navbar')

		@yield('content')

		

      <script>

function get_state_city(){
    var pincode = jQuery('#pincode').val();
    if(pincode==''){
      jQuery('#city').val('');
      jQuery('#state').val('');
      document.getElementById("wrong_pincode").innerHTML=""; 
    }else{
      jQuery.ajax({
        url:'{{route('dashboard.getPinCodeDetails')}}',
        type:'post',
        data:'pincode='+pincode+'&_token={{csrf_token()}}',
        success:function(data){
          if(data=='no'){
            // alert('Wrong Pincode');
            document.getElementById("wrong_pincode").innerHTML="Wrong Pincode."; 
            jQuery('#city').val('');
            jQuery('#state').val('');
          }else{
            var getData=$.parseJSON(data);
            jQuery('#city').val(getData.city);
            jQuery('#state').val(getData.state);
            document.getElementById("wrong_pincode").innerHTML=""; 
          }
        }
      });
    }
    }

         (function($) {
           var $main_nav = $('#main-nav');
           var $toggle = $('.toggle');
         
           var defaultOptions = {
             disableAt: false,
             customToggle: $toggle,
             levelSpacing: 40,
             levelTitles: true,
             levelTitleAsBack: true,
             pushContent: '#container',
             insertClose: 0,
             insertClose: false,
           };
         
           // call our plugin
           var Nav = $main_nav.hcOffcanvasNav(defaultOptions);
         
           // add new items to original nav
           $main_nav.find('li.add').children('a').on('click', function() {
             var $this = $(this);
             var $li = $this.parent();
             var items = eval('(' + $this.attr('data-add') + ')');
         
             $li.before('<li class="new"><a href="#">'+items[0]+'</a></li>');
         
             items.shift();
         
             if (!items.length) {
               $li.remove();
             }
             else {
               $this.attr('data-add', JSON.stringify(items));
             }
         
             Nav.update(true);
           });
         
           // demo settings update
         
           const update = (settings) => {
             if (Nav.isOpen()) {
               Nav.on('close.once', function() {
                 Nav.update(settings);
                 Nav.open();
               });
         
               Nav.close();
             }
             else {
               Nav.update(settings);
             }
           };
         
           $('.actions').find('a').on('click', function(e) {
             e.preventDefault();
         
             var $this = $(this).addClass('active');
             var $siblings = $this.parent().siblings().children('a').removeClass('active');
             var settings = eval('(' + $this.data('demo') + ')');
         
             update(settings);
           });
         
           $('.actions').find('input').on('change', function() {
             var $this = $(this);
             var settings = eval('(' + $this.data('demo') + ')');
         
             if ($this.is(':checked')) {
               update(settings);
             }
             else {
               var removeData = {};
               $.each(settings, function(index, value) {
                 removeData[index] = false;
               });
         
               update(removeData);
             }
           });
         })(jQuery);
      </script>
      <script>
         var owl = $('.owl-carousel');
         owl.owlCarousel({
           margin: 10,
           loop: true,
           items: 1
         })
      </script>
      <script>
        $(document).ready(function() {
            toastr.options.timeOut = 2000;
            @if (Session::has('alert-danger'))
                toastr.error('{{ Session::get('alert-danger') }}');
            @elseif(Session::has('alert-success'))
                toastr.success('{{ Session::get('alert-success') }}');
            @elseif(Session::has('alert-warning'))
                toastr.success('{{ Session::get('alert-warning') }}');
            @endif
        });
    
    </script>


    <!-- Required jquery and libraries -->
    <script src="{{asset('assets_dash/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets_dash/js/popper.min.js')}}"></script>
    <script src="{{asset('assets_dash/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- cookie js -->
    <script src="{{asset('assets_dash/js/jquery.cookie.js')}}"></script>

    <!-- Swiper slider  js-->
    <script src="{{asset('assets_dash/vendor/swiper/js/swiper.min.js')}}"></script>

    <!-- Customized jquery file  -->
    <script src="{{asset('assets_dash/js/main.js')}}"></script>
    <script src="{{asset('assets_dash/js/color-scheme-demo.js')}}"></script>

    <!-- PWA app service registration and works -->
    <script src="{{asset('assets_dash/js/pwa-services.js')}}"></script>

    <!-- page level custom script -->
    <script src="{{asset('assets_dash/js/app.js')}}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="{{asset("assets_dash/js/vendor/jquery.slim.min.js")}}"><\/script>')</script>
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
   </body>
</html>
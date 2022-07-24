<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="author" content="Webfinic">
	  <meta name="apple-mobile-web-app-capable" content="yes">
	  <meta name="apple-mobile-web-app-status-bar-style" content="default">
      {{-- <meta name="theme-color" content="#319197"> --}}
	  <meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: gap:">
      <title>@yield('title') - Agrina</title>
      <!-- nav Slide -->
      <link rel="stylesheet" href="{{asset('assets_dash/dist/css/navslide.css?ver=4.2.3')}}">
      <!-- Bootstrap core CSS -->
      <link rel="stylesheet" href="{{asset('assets_dash/dist/css/bootstrap.css')}}">
      <link rel="stylesheet" href="{{asset('assets_dash/dist/font/css/font-awesome.min.css')}}">
      <!-- Custom styles for this template -->
      <link rel="stylesheet" href="{{asset('assets_dash/dist/css/app.css')}}">
      <!-- javascript -->
      <script src="{{asset('assets_dash/vendors/jquery.min.js')}}"></script>
      <script src="{{asset('assets_dash/dist/js/hc-offcanvas-nav.js?ver=4.2.2')}}"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
      <style>
	  /*
      html{
         overflow: hidden;
      }         
      body{
         overflow: hidden !important;
      }    */  
      </style>
   </head>
   <body style="height:100%; width:100%; overflow:hidden;overflow-y:scroll;" class="index-app bg-gradient-auth">	
      <div id="pageloader">
         <img src="{{asset('assets_dash/loader-large.gif')}}" alt="processing..." />
      </div>
       {{-- @include('dashboard.auth.header') --}}
		@yield('content')
      <script src="{{asset('assets_dash/dist/js/bootstrap.bundle.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      <script>
         $(document).ready(function(){
             $("form").submit(function(){
                 $("#pageloader").fadeIn();
             });
         });
      </script>
       <script>
         $(document).ready(function() {
             toastr.options.timeOut = 5000;
             @if (Session::has('alert-danger'))
                 toastr.error('{{ Session::get('alert-danger') }}');
             @elseif(Session::has('alert-success'))
                 toastr.success('{{ Session::get('alert-success') }}');
             @elseif(Session::has('alert-warning'))
                 toastr.success('{{ Session::get('alert-warning') }}');
             @endif
         });
     
     </script>
   </body>
</html>
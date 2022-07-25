<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="keywords" content="html5, garden, landscape, corporate, responsive, clean">
        <meta name="description" content="Foundstrap Studio Zengarden Template">
        <meta name="author" content="foundstrap.com">

        <title>@yield('title')</title>

        <!-- retina bookmark icon -->
        <link rel="apple-touch-icon" href="{{url('front_assets/apple-touch-icon.png')}}">

        <!-- css -->
        <link rel="stylesheet" href="{{url('front_assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('front_assets/css/foundstrap.css')}}">
        <link rel="stylesheet" href="{{url('front_assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{url('front_assets/css/iconcrafts.css')}}">

        <!-- css plugin -->
        <link rel="stylesheet" href="{{url('front_assets/css/flexslider.css')}}">
        <link rel="stylesheet" href="{{url('front_assets/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{url('front_assets/css/owl-carousel.css')}}">
        <link rel="stylesheet" href="{{url('front_assets/css/smartmenu.min.css')}}">

        <!-- theme stylesheet -->
        <link rel="stylesheet" href="{{url('front_assets/css/style.css')}}">
        <link rel="stylesheet" href="{{url('front_assets/css/responsive.css')}}">

        <!-- favicon -->
        <link rel="shortcut icon" href="{{url('front_assets/img/favicon.png')}}">
    </head>

    <body>
       @include('layouts.header')

        @yield('content')

        @include('layouts.footer')
    </body>
</html>

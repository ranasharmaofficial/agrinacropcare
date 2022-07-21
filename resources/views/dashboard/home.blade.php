@extends('dashboard.layout.master')
@section('title')Home @endsection
@section('header-title')Dashboard @endsection
@section('content')
    <main role="main" class="ion-content">
        <div class="homepage-slider">
            <div class="owl-carousel">
                <div class="item">
                    <img alt="img" class="img-responsive single-img"
                        src="https://jssors8.azureedge.net/demos/image-slider/img/px-beach-daylight-fun-1430675-image.jpg">
                </div>
                <div class="item">
                    <img alt="img" class="img-responsive single-img"
                        src="https://wowslider.com/sliders/demo-5/data/images/sweden.jpg">
                </div>
            </div>
        </div>
        <div class="pt-4">
            <div class="row app-products">
                <div onclick="window.location.href='{{url('dashboard/crop-care')}}'" class="col-6">
                    <div class="p-3 shop-homepage mb-2 text-center">
                        <div class="shop-img">
                            <img src="{{asset('assets_dash/icon/wheat.png')}}" alt="">
                        </div>
                        <p class="font-weight-bold">Crop Care</p>
                    </div>
                </div>
                <div onclick="window.location.href='{{url('dashboard/animal-health-care')}}'" class="col-6">                    
                    <div class="p-3 shop-homepage mb-2 text-center">
                        <div class="shop-img">
                            <img src="{{asset('assets_dash/icon/healthcare.png')}}" alt="">
                        </div>
                        <p class="font-weight-bold">Animal Health Care</p>
                    </div>
                </div> 
                <div onclick="window.location.href='{{url('dashboard/insurance')}}'" class="col-6">                    
                    <div class="p-3 shop-homepage mb-2 text-center">
                        <div class="shop-img">
                            <img src="{{asset('assets_dash/icon/insurance.png')}}" alt="">
                        </div>
                        <p class="font-weight-bold">Insurance</p>
                    </div>
                </div>
                <div onclick="window.location.href='{{url('dashboard/home')}}'" class="col-6">                    
                    <div class="p-3 shop-homepage mb-2 text-center">
                        <div class="shop-img">
                            <img src="{{asset('assets_dash/icon/farmer_loan.png')}}" alt="">
                        </div>
                        <p class="font-weight-bold">Kisan Loan</p>
                    </div>
                </div>
                <div onclick="window.location.href='{{url('dashboard/home')}}'" class="col-6">                    
                    <div class="p-3 shop-homepage mb-2 text-center">
                        <div class="shop-img">
                            <img src="{{asset('assets_dash/icon/help.png')}}" alt="">
                        </div>
                        <p class="font-weight-bold">Helpline</p>
                    </div>
                </div>                
            </div>
        </div>
    </main>
@endsection

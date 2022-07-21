@extends('dashboard.layout.master')
@section('title')Home @endsection
@section('header-title')Crop Care @endsection
@section('content')
    <main role="main" class="ion-content">
        <div class="pt-4">
            <div class="row app-products">
                <div onclick="window.location.href='{{url('dashboard/home')}}'" class="col-6">
                    <div class="p-3 shop-homepage mb-2 text-center">
                        <div class="shop-img">
                            <img src="{{asset('assets_dash/icon/heal_crop.png')}}" alt="">
                        </div>
                        <p class="font-weight-bold">Heal Your Crop</p>
                    </div>
                </div>
                <div onclick="window.location.href='{{url('dashboard/home')}}'" class="col-6">                    
                    <div class="p-3 shop-homepage mb-2 text-center">
                        <div class="shop-img">
                            <img src="{{asset('assets_dash/icon/agriculture.png')}}" alt="">
                        </div>
                        <p class="font-weight-bold">Agri Inputs</p>
                    </div>
                </div> 
                <div onclick="window.location.href='{{url('dashboard/home')}}'" class="col-6">                    
                    <div class="p-3 shop-homepage mb-2 text-center">
                        <div class="shop-img">
                            <img src="{{asset('assets_dash/icon/shops.png')}}" alt="">
                        </div>
                        <p class="font-weight-bold">Nearest Agri Shop</p>
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

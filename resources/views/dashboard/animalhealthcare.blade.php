@extends('dashboard.layout.master')
@section('title')Home @endsection
@section('header-title')Animal Health Care @endsection
@section('content')
    <main role="main" class="ion-content">
        <div class="pt-4">
            <div class="row app-products">
                <div onclick="window.location.href='{{url('dashboard/home')}}'" class="col-6">
                    <div class="p-3 shop-homepage mb-2 text-center">
                        <div class="shop-img">
                            <img src="{{asset('assets_dash/icon/doctor.png')}}" alt="">
                        </div>
                        <p class="font-weight-bold">Doctor</p>
                    </div>
                </div>
                <div onclick="window.location.href='{{url('dashboard/home')}}'" class="col-6">                    
                    <div class="p-3 shop-homepage mb-2 text-center">
                        <div class="shop-img">
                            <img src="{{asset('assets_dash/icon/plant_medicine.png')}}" alt="">
                        </div>
                        <p class="font-weight-bold">Get Medicines</p>
                    </div>
                </div> 
                <div onclick="window.location.href='{{url('dashboard/home')}}'" class="col-6">                    
                    <div class="p-3 shop-homepage mb-2 text-center">
                        <div class="shop-img">
                            <img src="{{asset('assets_dash/icon/plant_feeds.png')}}" alt="">
                        </div>
                        <p class="font-weight-bold">Feeds</p>
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

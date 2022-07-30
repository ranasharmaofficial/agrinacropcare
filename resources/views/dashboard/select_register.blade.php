@extends('dashboard.layout.master')
@section('title')Home @endsection
@section('header-title')Registration @endsection
@section('content')
    <main role="main" class="ion-content">
        <div class="pt-4">
		<h5 class="text-center register_heading">Who Are You....?</h5>
            <div class="row app-products">
				
                <div onclick="window.location.href='{{url('dashboard/auth/farmer-registration')}}'" class="col-6">
                    <div class="p-3 shop-homepage mb-2 text-center">
                        <div class="shop-img">
                            <img src="{{asset('assets_dash/icon/farmer.png')}}" alt="">
                        </div>
                        <p class="font-weight-bold">Farmer</p>
                    </div>
                </div>
                <div onclick="window.location.href='{{url('dashboard/auth/doctor-registration')}}'" class="col-6">                    
                    <div class="p-3 shop-homepage mb-2 text-center">
                        <div class="shop-img">
                            <img src="{{asset('assets_dash/icon/reg_doctor.png')}}" alt="">
                        </div>
                        <p class="font-weight-bold">Cattle Doctor</p>
                    </div>
                </div> 
                <div onclick="window.location.href='{{url('dashboard/auth/agriculture-registration')}}'" class="col-6">                    
                    <div class="p-3 shop-homepage mb-2 text-center">
                        <div class="shop-img">
                            <img src="{{asset('assets_dash/icon/agri_retail.png')}}" alt="">
                        </div>
                        <p class="font-weight-bold">Agri Retailer</p>
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

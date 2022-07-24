@extends('dashboard.layout.master')
@section('title')Home @endsection
@section('header-title')Insurance @endsection
@section('content')
    <main role="main" class="ion-content">
        <div class="pt-4">
            <div class="row app-products">
                <div onclick="window.location.href='{{url('dashboard/crop-insurance')}}'" class="col-6">
                    <div class="p-3 shop-homepage mb-2 text-center">
                        <div class="shop-img">
                            <img src="{{asset('assets_dash/icon/crop_insurance.png')}}" alt="">
                        </div>
                        <p class="font-weight-bold">Crop Insurance</p>
                    </div>
                </div>
                <div onclick="window.location.href='{{url('dashboard/cattle-insurance')}}'" class="col-6">                    
                    <div class="p-3 shop-homepage mb-2 text-center">
                        <div class="shop-img">
                            <img src="{{asset('assets_dash/icon/plant_medicine.png')}}" alt="">
                        </div>
                        <p class="font-weight-bold">Cattle Insurance</p>
                    </div>
                </div> 
                              
            </div>
        </div>
    </main>
@endsection

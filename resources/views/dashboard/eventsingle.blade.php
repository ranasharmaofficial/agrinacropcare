@extends('dashboard.layout.master')
@section('title')Events @endsection
@section('header-title')Events @endsection

@section('content')
<style>
    p{
        padding: 0;
        margin: 0;
        font-weight: 500;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        font-size: 1rem;
    }
    .payment-card{
        border-top: 0.15rem solid rgb(0, 131, 136) !important;
    }
</style>
    <main role="main" class="ion-content ion-myprofile">
        <div class="card pb-2">
            <div class="card-header bg-indigo text-white font-weight-bold">
                {{$eventdetails->eventTitle}}
            </div>
           
            <div class="card-body p-0">
                {{-- <div class="overflow-hidden border-top p-3 d-flex justify-content-between align-items-center">
                    <img src="{{asset('uploads/events').'/'.$eventdetails->eventImage}}" alt="">
                </div> --}}
            </div>
            
            
        </div>
        
    </main>
@endsection

@extends('dashboard.layout.master')
@section('title')Gallery @endsection
@section('header-title')Gallery @endsection

@section('content')
<style>
p {
    padding: 0;
    margin: 0;
    font-weight: 500;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    font-size: 1rem;
}

.payment-card {
    border-top: 0.15rem solid rgb(0, 131, 136) !important;
}
</style>
<main role="main" class="ion-content ion-myprofile">
    <div class="card pb-2">
        <div class="card-header bg-indigo text-white font-weight-bold">
           Gallery Details
        </div>
        <div class="card-body p-0 row">
            @foreach ($pictures as $item)
				@php
                    foreach(json_decode($item->galleryImage) as $picture){
                @endphp 
            <div class="col-6">
                <div class="card">
                    <img class="card-img-top img-fluid" src="{{asset('uploads/gallery/'.$picture)}}" alt="Prabuddham Academy">
                </div>
            </div> 
			@php
                }
            @endphp 
            @endforeach
         </div>
    </div>
</main>
@endsection
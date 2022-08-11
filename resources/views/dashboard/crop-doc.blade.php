@extends('dashboard.layout.master')
@section('title')
    Home
@endsection
@section('header-title')
    Crop Doctor
@endsection
@section('content')
    <main role="main" class="ion-content">
        <div class="pt-4">
            <div class="row app-products">
                <div class="col-12">
                    <div class="text-center bg-success crop_doc">
                        <p class="">+91 8825171386</p>

                        <button class="btn btn-success mt-3" onclick="window.location.href='tel:8825171386'"><i class="fa fa-phone" aria-hidden="true"></i>
                            Call</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

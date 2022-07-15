@extends('dashboard.layout.master')
@section('title')All Notification @endsection
@section('header-title')All Notification @endsection

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
            All Notification
        </div>
        @foreach ($notice as $item)
        <div class="card-body p-0">
            <div class="card mb-0">
                <div class="card-body p-2">
                    <p>{{$item->noticeTitle}}</p>
                </div>
            </div>
        </div><!---CardEnd--->
        @endforeach
    </div>

</main>
@endsection
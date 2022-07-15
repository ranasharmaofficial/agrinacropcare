@extends('dashboard.layout.master')
@section('title')Attendance @endsection
@section('header-title')Attendance @endsection

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
           Attendance Details
        </div>
        <div class="card-body p-0">
            @foreach ($attendance as $item)
            <div class="card mb-0">
                <div class="card-body p-3">
                    <p>{{$item->attendanceDate}}&nbsp;-
                    @if ($item->ap=='Present')
                    <span class="text-success">{{$item->ap}}
                    @else
                    <span class="text-danger">{{$item->ap}}
                    @endif
                    </span></p>

                </div>
            </div>
            @endforeach
            

        </div>
    </div>

</main>
@endsection
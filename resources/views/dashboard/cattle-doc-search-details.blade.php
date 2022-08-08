@extends('dashboard.layout.master')
@section('title')
    Cattle Doctor
@endsection
@section('header-title')
    Cattle Doctor
@endsection

@section('content')
    <main role="main" class="ion-content ion-myprofile">

        <div class="card mb-6">
            <div class="card-header font-weight-bold text-center text-white bg-success">
                Look for Cattle Doctor
            </div>
            @if (count($cattledoctor) > 0)
                <div class="card-body p-2">
                    <p style="color:rgb(141, 10, 119);font-weight:bold; margin-left:15px">Showing results from {{ $pin }}</p>
                    @foreach ($cattledoctor as $item)
                        <div class="row mb-3">
                            <div class="col-md-12 cattle_show_result">
                                {{-- <p class=" text-primary">{{$item->name}}</p> --}}
                                <p class=" text-primary"><span>Name
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span>
                                    {{ $item->name }}</p>
                                <p class=" text-primary"><span>Address
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span> Purnea</p>
                                <p class=" text-primary"><span>Experience :&nbsp;</span> 2 Years</p>
                            </div>
                            <div class="col">
                                <a href="tel:{{ $item->mobile }}" class="btn text-white doct_call_now"><i
                                        class="fa fa-phone" aria-hidden="true"></i> Call</a>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            @else
                <div class="card-body p-2">
                    <div class="row mb-3">
                        <div class="col-md-12 text-center mb-2">
                            <p><i class="fa fa-frown-o" aria-hidden="true" style="font-size: 70px"></i></p>
                            <span class="text-center text-danger">No&nbsp;related&nbsp;Data&nbsp;Found</span>
                        </div>
                        <div class="col">
                            <a href="{{ url('dashboard/agriculture-shop') }}"
                                class="btn float-right text-white doct_call_now"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> &nbsp;Back</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        </div>
    </main>

@endsection

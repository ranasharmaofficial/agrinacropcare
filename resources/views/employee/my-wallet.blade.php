@extends('employee.layouts.master')
@section('title', 'My Wallet')
@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">@yield('title')</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ url('employee/home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div  style="float:right;" class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title align-items-right text-right">
                            <h4 class="text-right">Designation :<span class="text-primary"> Employee</span></h4>
                            <h4 class="">Last Login at :<span class="text-primary"> {{$lastLoginTime->created_at}}</span></h4>
                            <h4 class="mt-1">Name : <span class="text-primary"> {{ $LoggedEmployee['name'] }}</span</h4>
                            <h4 class="mt-1">User Id :<span class="text-primary">  {{ $LoggedEmployee['user_id'] }}</span</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <!-- end page title -->
            
            <div class="row justify-content-center">
                
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h4 class="card-title text-white">@yield('title')</h4>
                        </div>
                        <div class="card-body">
                            <div class="flash-message">
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                    @if (Session::has('alert-' . $msg))
                                        <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                                            {{ Session::get('alert-' . $msg) }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
							<h4 class="card-title mb-4">Earning Report</h4>
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div>
                                            <div class="mb-3">
                                                <img style="height:60px;" src="https://cdn-icons-png.flaticon.com/512/25/25473.png" alt="inr" class="img-fluid">
                                            </div>
                                            <h3 class="mb-0">Rs&nbsp;{{$employee_amount}}.00</h3>
                                            <p class="text-muted text-truncate my-2">Total Earned</p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer align-items-right">
                           <a href="{{url('employee/wallet-history')}}"><button class="btn btn-success" type="button">View Wallet History</button> </a>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row --> 
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection

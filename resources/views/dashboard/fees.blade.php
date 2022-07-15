@extends('dashboard.layout.master')
@section('title')Fees Details @endsection
@section('header-title')Fees @endsection

@section('content')
    <main role="main" class="ion-content ion-myprofile">
        <div class="mb-2 card bg-white profile-box text-center">
            <div class="py-4 px-3 border-bottom">
                <img alt="img" class="img-fluid mt-2 rounded-circle" src="{{asset('uploads/students/'.$userinfo->studentPhoto)}}">
                <h5 class="font-weight-bold text-dark mb-1 mt-4">{{ $LoggedUserInfo['name'] }}</h5>
                <p class="mb-0 text-muted">CLASS - {{$course->courseName}}</p>
            </div>
            {{-- <div class="d-flex">
                <div class="col-6 border-right p-3">
                    <a class="card-link-style" href="myaddress.html">
                        <h6 class="font-weight-bold text-dark mb-1">
                            <i class="fa fa-location-arrow" aria-hidden="true"></i>
                        </h6>
                        <p class="mb-0 text-black-50 small">Edit Address</p>
                    </a>
                </div>
                <div class="col-6 p-3">
                    <a class="card-link-style" href="editprofile.html">
                        <h6 class="font-weight-bold text-dark mb-1">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        </h6>
                        <p class="mb-0 text-black-50 small">Edit Profile</p>
                    </a>
                </div>
            </div> --}}
            <div class="overflow-hidden border-top p-3 d-flex justify-content-between align-items-center">
                <small class="text-secondary font-weight-bold">
                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                    Dues Amount:
                </small>
                <small class="text-primary font-weight-bold">Rs: {{$duesamount}}/-</small>
            </div>
            <div class="overflow-hidden border-top p-3 d-flex justify-content-between align-items-center">
                <small class="text-secondary font-weight-bold">
                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                    Paid Amount:
                </small>
                <small onclick="window.location.href='{{url('dashboard/payment-history')}}'" class="text-white font-weight-bold btn btn-danger">View History</small>
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-indigo text-white font-weight-bold">
                Pay Dues Fees
            </div>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Total Fees</th>
                        <td class="text-right">&#8377;&nbsp;&nbsp;&nbsp;{{$feedeatils->admissionFee + $feedeatils->tutionFee - $feedeatils->discount}}/-</td>
                    </tr>
                    <tr>
                        <th>Total Fees Paid</th>
                        <td class="text-right">&#8377;&nbsp;&nbsp;&nbsp;{{$paymentdeatils}}/-</td>
                    </tr>
                    <tr>
                        <th>Total Amount to pay</th>
                        <td class="text-right">&#8377;&nbsp;&nbsp;&nbsp;{{$duesamount}}/-</td>
                    </tr>
                    <tr>
                        <td class="text-right" colspan="2"><button class="btn btn-primary"><i class="fa fa-paper-plane"></i> Pay Fees Now</button></td>    
                    </tr>                    
                </tbody>
            </table>
        </div>
        
    </main>
@endsection

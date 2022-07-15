@extends('dashboard.layout.master')
@section('title')Profile @endsection
@section('header-title')Profile @endsection

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
        </div>
        <div class="card">
            <div class="card-header bg-indigo text-white font-weight-bold">
                General Details
            </div>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Admission&nbsp;Number:</th>
                        <td>{{$userinfo->admissionNumber}}</td>
                    </tr>
                    <tr>
                        <th>Class:</th>
                        <td>{{$course->courseName}}</td>
                    </tr>
                    <tr>
                        <th>Batch:</th>
                        <td>{{date("g:i a", strtotime($batch->batchtimefrom))}} - {{date("g:i a", strtotime($batch->batchtimeto))}}</td>
                    </tr>
                    <tr>
                        <th>Admission Date:</th>
                        <td>{{date("d-M-Y", strtotime($userinfo->joiningDate))}}</td>
                    </tr>
                    <tr>
                        <th>Gurdian&nbsp;Name:</th>
                        <td>{{$userinfo->gurdianName}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card">
            <div class="card-header bg-indigo text-white font-weight-bold">
                Personal Details
            </div>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Name:</th>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <th>Mobile:</th>
                        <td>{{$user->mobile}}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <th>Date of Birth:</th>
                        <td>{{$userinfo->dob}}</td>
                    </tr>
                    <tr>
                        <th>Gender:</th>
                        <td>{{$userinfo->gender}}</td>
                    </tr>
                    <tr>
                        <th>Blood Group:</th>
                        <td>{{$userinfo->bloodGroup}}</td>
                    </tr>
                    <tr>
                        <th>Birth&nbsp;Place:</th>
                        <td>{{$userinfo->birthPlace}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection

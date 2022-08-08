@extends('dashboard.layout.master')
@section('title')
    Edit Profile
@endsection
@section('header-title')
    Edit Profile
@endsection

@section('content')
    <main role="main" class="ion-content ion-myprofile">
        <div class="mb-2 card bg-white profile-box text-center">
            <div class="py-4 px-3 border-bottom">
                <img alt="img" class="img-fluid mt-2 rounded-circle" src="https://i.pinimg.com/736x/d0/7a/f6/d07af684a67cd52d2f10acd6208db98f.jpg">
                {{-- <h5 class="font-weight-bold text-dark mb-1 mt-4">{{ $LoggedUserInfo['name'] }}</h5> --}}
            </div>
            

            {{-- @if ($user->role == 2)
                <div class="overflow-hidden border-top p-3 d-flex justify-content-between align-items-center">
                    <small class="text-secondary font-weight-bold">
                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                        Wallet Amount:
                    </small>
                    <small class="text-primary font-weight-bold">Rs: 20/-</small>
                </div>
            @endif --}}
        </div>

        <div class="card">
            <div class="card-header bg-indigo text-white font-weight-bold">
                Personal Details
            </div>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Name:</th>
                        {{-- <td>{{ $user->name }}</td> --}}
                    </tr>
                    <tr>
                        <th>Mobile:</th>
                        {{-- <td>{{ $user->mobile }}</td> --}}
                    </tr>
                    {{-- <tr>
                        <th>Email:</th>
                        <td>{{$user->email}}</td>
                    </tr> --}}

                </tbody>
            </table>
        </div>
    </main>
@endsection

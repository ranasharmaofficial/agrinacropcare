@extends('dashboard.layout.master')
@section('title')Cattle Insurance @endsection
@section('header-title')Cattle Insurance Preview @endsection
@php
    $logged_id = Session::get('LoggedDash');
$logged_name = \App\Models\User::where('id',$logged_id)->first();
@endphp
@section('content')
<style>
    .razorpay-payment-button {
        color: white !important;
        background-color: #87ba45;
        border-color: #87ba45;
        font-size: 14px;
        width: 100%;
        height: 45px;
        text-align: center;
        border-radius: 2px;
        padding: 10px;
    }
    </style>
    <main role="main" class="ion-content ion-myprofile">
        
        
        <div class="card">
            <div class="card-header bg-indigo text-white font-weight-bold">
                Personal Details
            </div>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Employee Code:</th>
                        <td>{{$getdetails->employee_id}}</td>
                    </tr>
                    <tr>
                        <th>Name:</th>
                        <td>{{$getdetails->salutation.' '.$getdetails->name}}</td>
                    </tr>
                    <tr>
                        <th>Mobile:</th>
                        <td>{{$getdetails->mobile}}</td>
                    </tr>
                    <tr>
                        <th>Gender:</th>
                        <td>{{$getdetails->gender}}</td>
                    </tr>
                    <tr>
                        <th>Date of Birth:</th>
                        <td>{{$getdetails->dob}}</td>
                    </tr>
                    <tr>
                        <th>Address:</th>
                        <td>{{$getdetails->address}}</td>
                    </tr>
                    <tr>
                        <th>Pincode:</th>
                        <td>{{$getdetails->pincode}}</td>
                    </tr>
                    <tr>
                        <th>State:</th>
                        <td>{{$getdetails->state}}</td>
                    </tr>
                    <tr>
                        <th>District:</th>
                        <td>{{$getdetails->district}}</td>
                    </tr>
                    <tr>
                        <th>Major Crops Insurred:</th>
                        <td>{{$getdetails->major_crops_insurred}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card">
            <div class="card-header bg-indigo text-white font-weight-bold">
                Plan Details
            </div>
            <table class="table table-striped">
                <tbody>
                    
                    <tr>
                        <th>Plan Details:</th>
                        <td>{{$getdetails->plan_details}}</td>
                    </tr>
                     
                </tbody>
            </table>
        </div>

        <div style="margin-bottom: 71px;" class="card">
            <div class="card-header bg-indigo text-white font-weight-bold">
                Nominee Details
            </div>
            <table class="table table-striped">
                <tbody>
                    
                    <tr>
                        <th>Nominee Name:</th>
                        <td>{{$getdetails->nominee_salutation.' '.$getdetails->nominee_name}}</td>
                    </tr>
                    <tr>
                        <th>Nominee Father's Name:</th>
                        <td>{{$getdetails->nominee_father}}</td>
                    </tr>
                    <tr>
                        <th>Nominee Date of Birth:</th>
                        <td>{{$getdetails->nominee_dob }}</td>
                    </tr>
                    <tr>
                        <th>Nominee Relation:</th>
                        <td>{{$getdetails->nominee_relation }}</td>
                    </tr>
                     
                </tbody>
            </table>
            @php
            $cropInsuranceAmount = \App\Models\FixInsuranceAmount::first();
            $cropInsuranceAmount = $cropInsuranceAmount->cattle_insurance_amount;
        @endphp
            <div class="card-body">
                <form action="{{route('dashboard.getInsuranceDone')}}" method="post">
                    @csrf
                    <input type="hidden" name="tokenno" value="{{$getdetails->token_no}}">
                    <input type="hidden" name="type" value="2">
                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                            data-key="{{ env('RAZORPAY_KEY') }}"
                            data-amount="{{$cropInsuranceAmount}}00"
                            data-buttontext="Pay Now"
                            data-name="Agrina Crop Care"
                            data-description="Processing Fee"
                            data-image="{{asset('front_assets/img/logo.png')}}"
                            data-prefill.name="{{$getdetails->name }}"
                            data-prefill.email="info.agrinacropcare@gmail.com"
                            data-prefill.contact="{{$getdetails->mobile }}"
                            data-theme.color="#A4139D">
                    </script>
                </form>
            </div>
        </div>
    </main>
@endsection

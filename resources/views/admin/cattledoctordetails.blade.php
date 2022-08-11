@extends('admin.layouts.master')
@section('title','View Cattle Doctor Details')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">@yield('title')</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        
		 
       <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                         <div class="dastone-profile">
                            <div class="row">
                                <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                    <div class="dastone-profile-main">
                                        <div class="dastone-profile-main-pic">
                                            <img src="{{asset('uploads/documents/'.$cattle_doc_details->employee_photo	)}}" alt="" height="110" class="rounded-circle">
                                            <span class="dastone-profile_main-pic-change">
                                                <i class="fas fa-camera"></i>
                                            </span>
                                        </div>
                                        <div class="dastone-profile_user-detail">
                                            <h5 class="dastone-user-name">{{$cattle_doc_details->name}}</h5>                                                        
                                            <p class="mb-0 dastone-user-name-post">Farmer Code: {{$cattle_doc_details->user_id}}</p>                                                        
                                        </div>
                                    </div>                                                
                                </div><!--end col-->
                                <div class="col-lg-4 ms-auto align-self-center">
                                    <ul class="list-unstyled personal-detail mb-0">
                                        <li class=""><i class="ti ti-mobile me-2 text-secondary font-16 align-middle"></i> <b> Phone </b> : +91 {{$cattle_doc_details->mobile}}</li>
                                        <li class="mt-2"><i class="ti ti-email text-secondary font-16 align-middle me-2"></i> <b> Email </b> : {{$cattle_doc_details->email}}</li>
                                    </ul>
                                   
                                </div><!--end col-->
                            </div><!--end row-->

                        </div><!--end f_profile-->   

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-white bg-info">Profile Details
                        <a style="float:right;" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="btn btn-danger btn-rounded btn-sm" href="{{url('admin/cattle-doctor-list')}}">Go Back</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Unique Code</td>
                                    <td class="text-right">{{$cattle_doc_details->user_id}}</td>
                                </tr>
                                {{-- <tr>
                                    <td>Qualification</td>
                                    <td class="text-right">{{$cattle_doc_details->qualification}}</td>
                                </tr>
                                <tr>
                                    <td>Experience</td>
                                    <td class="text-right">{{$cattle_doc_details->experience}}</td>
                                </tr> --}}
                                <tr>
                                    <td>Date of Birth</td>
                                    <td class="text-right">{{$cattle_doc_details->dob}}</td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td class="text-right">{{$cattle_doc_details->gender}}</td>
                                </tr>
                                <tr>
                                    <td>Aadhar Number</td> 
                                    <td class="text-right"><a class="btn btn-info btn-sm" target="_blank" href="{{asset('uploads/documents/'.$cattle_doc_details->aadhar_card)}}">View Aadhar Card</a></td>
                                </tr>
                                {{-- <tr>
                                    <td>Pan Number</td>
                                    <td class="text-right"><a class="btn btn-info btn-sm" target="_blank" href="{{asset('uploads/documents/'.$cattle_doc_details->pan_card)}}">View Pan Card</a></td>
                                </tr>
                                <tr>
                                    <td>Voter Id</td>
                                    <td class="text-right"><a class="btn btn-info btn-sm" target="_blank" href="{{asset('uploads/documents/'.$cattle_doc_details->voter_id)}}">View VoterId Card</a></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td class="text-right">{{$cattle_doc_details->landmark}}, {{$cattle_doc_details->city}}, {{$cattle_doc_details->state}} - {{$cattle_doc_details->pincode}}, {{$cattle_doc_details->country}}</td>
                                </tr>   --}}
                            </tbody>
                        </table>   

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
		
    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection
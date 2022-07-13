@extends('admin.layouts.master')
@section('title','Teacher Details')
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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Distributor</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        
		@if ($flag)
       <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-white bg-primary">
                        Teacher Info
                    </div>
                    <div class="card-body">
                         <div class="dastone-profile">
                            <div class="row">
                                <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                    <div class="dastone-profile-main">
                                        {{-- <div class="dastone-profile-main-pic">
                                            <img src="{{asset('uploads/documents/'.$distributordata->employee_photo	)}}" alt="" height="110" class="rounded-circle">
                                            <span class="dastone-profile_main-pic-change">
                                                <i class="fas fa-camera"></i>
                                            </span>
                                        </div> --}}
                                        <div class="dastone-profile_user-detail">
                                            <h5 class="dastone-user-name">{{$teacherdata->name}}</h5>                                                        
                                            <p class="mb-0 dastone-user-name-post"><b>Teacher ID:</b> {{$teacherdata->student_id}}</p>                                                        
                                        </div>
                                    </div>                                                
                                </div><!--end col-->
                                <div class="col-lg-4 ms-auto align-self-center">
                                    <ul class="list-unstyled personal-detail mb-0">
                                        <li class=""><i class="ti ti-mobile me-2 text-secondary font-16 align-middle"></i> <b> Phone </b> : +91 {{$teacherdata->mobile}}</li>
                                        <li class="mt-2"><i class="ti ti-email text-secondary font-16 align-middle me-2"></i> <b> Email </b> : {{$teacherdata->email}}</li>
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
                    <div class="card-header text-white bg-info">Teacher Details</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                               <tr>
                                    <td>State</td>
                                    <td class="text-right">Bihar</td>
                                </tr>
                                <tr>
                                    <td>District</td>
                                    <td class="text-right">{{$districtdata->name}}</td>
                                </tr>
                                <tr>
                                    <td>Block</td>
                                    <td class="text-right">{{$blockdata->name}}</td>
                                </tr>
                                <tr>
                                    <td>School Name</td>
                                    <td class="text-right">{{$teacherdata->school_name}}</td>
                                </tr>
                                <tr>
                                    <td>School Id (UDISE)</td>
                                    <td class="text-right">{{$teacherdata->school_id}}</td>
                                </tr>
                               
                                 
                             </tbody>
                        </table>   
                        <hr>
                         
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
		@else
		<div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.view-distributor')}}" class="row" enctype="multipart/form-data">
                            @csrf
                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="Distributorcode">Distributor Code <star>*</star></label>
                                    <input class="form-control" id="Distributorcode" required type="text" name="distributorcode" />
                                </div>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <button type="submit" class="btn btn-info btn-sm">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
		 @endif
    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection
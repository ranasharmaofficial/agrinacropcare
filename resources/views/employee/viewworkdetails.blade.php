@extends('employee.layouts.master')
@section('title','Work Details')
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
                    <div class="card-header text-white bg-info">Work Details</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Work Title</td>
                                    <td class="text-right">{{$workdetailsdata->title}}</td>
                                </tr>
                                <tr>
                                    <td>Amount</td>
                                    <td class="text-right">Rs&nbsp;{{$workdetailsdata->amount}}/-</td>
                                </tr>
                                <tr>
                                    <td>User Commission Amount</td>
                                    <td class="text-right">Rs&nbsp;{{$workdetailsdata->user_work_amount}}/-</td>
                                </tr>
                                 <tr>
                                    <td>Payment Details</td>
                                    <td class="text-right">
                                        @if($workdetailsdata->status=='2')
                                        <button class="btn btn-danger btn-sm" type="button">Payment Pending</button>
                                            @elseif($workdetailsdata->status=='3')
                                        <button class="btn btn-success btn-sm" type="button">Payment Received in Bank</button>
                                        
                                            @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Receipt No.</td>
                                    <td class="text-right">{{$workdetailsdata->receipt_no}}</td>
                                </tr>
                                
                                <tr>
                                    <td>Payment Mobile</td>
                                    <td class="text-right">{{$workdetailsdata->payment_mobile}}</td>
                                </tr>
                                <tr>
                                    <td>Payment Email</td>
                                    <td class="text-right">{{$workdetailsdata->payment_email}}</td>
                                </tr>
                                
                             </tbody>
                        </table>   
                        <hr>
                        <h4 class="text-danger text-center">Work details data</h4>
                        <div class="row my-3">
                            @php
                                        foreach(json_decode($workdetailsdata->images) as $picture){
                                    @endphp
                            <div class="col-sm-3">
                                <div class="img-fluid">
                                    <img src="{{asset('uploads/gallery').'/'.$picture}}" alt="img-1" width="160">
                                </div>
                            </div>
                            @php
                                        }
                                    @endphp
                        </div>
                        @if ($workdetailsdata->work_completed_status=='1')
                        <form action="{{route('markAsCompleted')}}" class="" method="post" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="row my-3 justify-content-center">
                                <div class="col-md-6">
                                    
                                    <div class="form-group my-3">
                                        <label for="" class="form-label">You'll get Comission: <star>*</star></label>
                                        <input readonly type="text" value="Rs&nbsp;{{$workdetailsdata->user_work_amount}}/-" class="form-control">
                                        <input readonly type="hidden" name="employee_id" value="{{$workdetailsdata->employee_id}}" class="form-control">
                                        <input readonly type="hidden" name="work_id" value="{{$workdetailsdata->id}}" class="form-control">
                                    </div>  
                                    <div class="form-group my-3">
                                        <button type="submit" class="btn btn-success">Mark as Completed</button>    
                                    </div> 
                                </div>
                                
                            </div>
                        </form>
                        @elseif ($workdetailsdata->work_completed_status=='2')
                        <h3 class="text-center text-success">Your Comission of this work is being added to your wallet. Kindly check your Wallet.</h3>
                        @endif
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
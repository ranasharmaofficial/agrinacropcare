@extends('admin.layouts.master')
@section('title','Crop Insurance Details')
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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Crop Insurance Details</a></li>
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
                    <div class="card-header text-white bg-info">Insurance Details of - {{$crop_insurance_details->salutation.' '.$crop_insurance_details->name}} ({{$crop_insurance_details->insurance_no}})
					<a style="float:right;" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="btn btn-danger btn-rounded btn-sm" href="{{url('admin/crop-insurance')}}">Go Back</a>
					</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class="text-danger font-weight-bold">Employee Code</td>
                                    <td class="text-right text-danger font-weight-bold">{{$emp_data->user_id}} - <span class="text-primary">{{$emp_data->name}}</span></td>
                                </tr>
                                <tr>
                                    <td>Insurance No</td>
                                    <td class="text-right">{{$crop_insurance_details->insurance_no}}</td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td class="text-right">{{$crop_insurance_details->salutation.' '.$crop_insurance_details->name}}</td>
                                </tr>
                                <tr>
                                    <td>Date of Birth</td>
                                    <td class="text-right">{{$crop_insurance_details->dob}}</td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td class="text-right">{{$crop_insurance_details->gender}}</td>
                                </tr>
								<tr>
                                    <td>Address</td>
                                    <td class="text-right">{{$crop_insurance_details->address}}, {{$crop_insurance_details->district}}, {{$crop_insurance_details->state}} - {{$crop_insurance_details->pincode}}</td>
                                </tr>
                                <tr>
                                    <td>Insurance Start Date</td>
                                    <td class="text-right">{{$crop_insurance_details->insurance_start_date}}</td>
                                </tr>
								<tr>
                                    <td>Insurance End Date</td>
                                    <td class="text-right">{{$crop_insurance_details->insurance_end_date}}</td>
                                </tr>
                                <tr>
                                    <td>Insurance Amount</td>
                                    <td class="text-right">Rs&nbsp;{{$crop_insurance_details->amount}}/-</td>
                                </tr>
                                 <tr>
                                    <td>Payment Details</td>
                                    <td class="text-right">
                                        @if($crop_insurance_details->status=='0')
                                        <span class="text-danger" type="button">Payment Pending</span>
                                            @elseif($crop_insurance_details->status=='1')
                                        <span class="text-success" type="button">Payment Received in Bank</span>
                                        
                                            @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Receipt No.</td>
                                    <td class="text-right">{{$crop_insurance_details->receipt_no}}</td>
                                </tr>
                                <tr>
                                    <td>Payment Id</td>
                                    <td class="text-right">{{$crop_insurance_details->payment_id}}</td>
                                </tr>
                                <tr>
                                    <td>Payment Mobile</td>
                                    <td class="text-right">{{$crop_insurance_details->payment_mobile}}</td>
                                </tr>
                                <tr>
                                    <td>Payment Email</td>
                                    <td class="text-right">{{$crop_insurance_details->payment_email}}</td>
                                </tr>
                                <tr>
                                    <td>Payment Card id</td>
                                    <td class="text-right">{{$crop_insurance_details->payment_card_id}}</td>
                                </tr>
                                 <tr>
                                    <td>Payment Method</td>
                                    <td class="text-right">{{$crop_insurance_details->method}}</td>
                                </tr>
                                 <tr>
                                    <td>Payment VPA</td>
                                    <td class="text-right">{{$crop_insurance_details->payment_vpa}}</td>
                                </tr>
								<tr>
                                    <td>Created At</td>
                                    <td class="text-right">{{$crop_insurance_details->created_at}}</td>
                                </tr>
                                  
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
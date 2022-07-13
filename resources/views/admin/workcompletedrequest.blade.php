@extends('admin.layouts.master')
@section('title','Work Completed Request List')
@section('content')
<style>
table.border-modal{
    border:1px solid blue;
    margin-top:20px;
  }
table.border-modal > thead > tr > th{
    border:1px solid rgb(156, 231, 206);
}
table.border-modal > tbody > tr > th{
    border:1px solid rgb(156, 231, 206);
}
table.border-modal > tbody > tr > td{
    border:1px solid rgb(156, 231, 206);
}
</style>
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
                    <div class="card-header bg-danger rounded">
                        <h3 class="card-title text-white">@yield('title')</h3>
                        <p class="p-0 m-0 text-white">Total Work Completed Request: <b>{{$worklist->total();}}</b>, Page No: <b>{{$worklist->currentPage();}}</b></p>
                    </div>
                    <div class="card-body table-responsive">                        
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead style="background-color:rgb(6, 117, 125);color:#fff;" class="thead-dark">
                            <tr>
                                <th class="text-center">Sl. No.</th>
                                <th class="text-center">Teacher ID</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Data</th>
                                <th class="text-center">Action</th>
                                <th class="text-center">Created At</th>
                                {{-- <th class="text-center">Action</th> --}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($worklist as $key => $data)
                            <tr>
                                <td>{{($worklist->currentpage()-1) * $worklist->perpage() + $key + 1}}</td>
                                <td>{{$data->teacher_id}}</td>
                                <td>{{$data->title}}</td>
                                <td>
                                    <div class="popup-gallery">
                                        @php
                                        foreach(json_decode($data->images) as $picture){
                                    @endphp
                                        <a class="float-start" href="{{asset('uploads/gallery').'/'.$picture}}" title="Project 1">
                                            <div class="img-fluid">
                                                <img src="{{asset('uploads/gallery').'/'.$picture}}" alt="img-1" width="120">
                                            </div>
                                        </a>
                                        @php
                                        }
                                    @endphp
                                        
    
                                    </div>
                                </td>
                               
                                <td class="text-center">
                                    @if ($data->status=='1')
                                    <form action="{{route('updateAmount')}}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="text" class="form-control form-control-sm my-2" placeholder="Enter Amount" name="amount" required>
                                        <input type="text" class="form-control form-control-sm my-2" placeholder="Enter User Work Amount" name="user_work_amount" required>
                                        <input type="hidden" value="{{$data->id}}" name="teacherid" required>
                                        <button class="btn btn-success btn-sm" type="submit">Request</button>
                                    </form>
                                    @elseif($data->status=='2')
                                    <button class="btn btn-danger btn-sm" type="button">Payment Pending</button>
                                        @elseif($data->status=='3')
                                               
                                        <a href="{{url('admin/work-details/'.$data->id)}}" class="btn btn-primary btn-sm">View&nbsp;Details</a>
                                    {{-- </form> --}}
                                    @endif
                                </td> 
                                <td>{{$data->created_at->format('d-m-Y')}}</td>
                                   {{--  @else
                                    <form action="{{route('blockUserContract')}}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" value="{{$data->user_id}}" name="userid" required>
                                        <button class="btn btn-danger" type="submit"><i class="fa fa-ban"></i>&nbsp;Block</button>
                                    </form>
                                    @endif
                                    <button type="button" class="btn btn-info d-inline" title="View Details" onclick="showDetails(this)" id="{{$data->user_id}}"><i class="fa fa-eye"></i></button>
                                </td> --}}
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="7">
                                    <nav aria-label="...">
                                        <ul class="pagination justify-content-end mb-0">
                                            {{$worklist->links();}}
                                        </ul>
                                    </nav>
                                </td>
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
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" id="userDetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: #ECF8FE;">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Supervisor Details - (User ID: <span id="userid"></span>)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="userdetailsshow">
                <table class="table table-bordered border-modal">
                    <tr>
                        <th>Contractor ID:</th>
                        <td id="concontractid"></td>
                    </tr>
                    <tr>
                        <th>Aadhar Number:</th>
                        <td id="conaadharnumber"></td>
                    </tr>
                    <tr>
                        <th>Pan Number:</th>
                        <td id="conpannumber"></td>
                    </tr>
                    <tr>
                        <th>Address:</th>
                        <td><span id="conlandmark"></span>, <span id="concity"></span>, <span id="constate"></span>, <span id="concountry"></span>, <span id="conpincode"></span></td>
                    </tr>
                    <tr>
                        <th>Alternate Mobile Number:</th>
                        <td id="conaltmobile"></td>
                    </tr>
                    <tr>
                        <th>Photo:</th>
                        <td id="conphoto"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <form action="{{route('disApproveContractor')}}" method="post" class="d-inline">
                    @csrf
                    <input type="hidden" value="" name="userid" id="userContractID" required />
                    <button type="submit" class="btn btn-danger"><i class="fa fa-thumbs-down" aria-hidden="true"></i>&nbsp;Dis-Approve</button>
                </form>
                <form action="{{route('approveContractor')}}" method="post" class="d-inline">
                    @csrf
                    <input type="hidden" value="" name="userid" id="userContractIDa" required />
                    <button type="submit" class="btn btn-primary"><i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp;Approve</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
    function showDetails(showdetails){
        $('#userDetails').modal('show'); 
        let user_id = $(showdetails).attr('id');
        $('#userid').html(user_id);
        $.ajax({
            url: '{{url('getuserdetails')}}',
            type: 'post',
            data:'userid='+user_id+'&_token={{csrf_token()}}',
            success:function(respons){
                $('#concontractid').html(JSON.parse(respons)[0].contractorID);
                $('#conaadharnumber').html(JSON.parse(respons)[0].aadharNumber);
                $('#conpannumber').html(JSON.parse(respons)[0].panNumber);
                $('#conlandmark').html(JSON.parse(respons)[0].landmark);
                $('#concity').html(JSON.parse(respons)[0].city);
                $('#constate').html(JSON.parse(respons)[0].state);
                $('#concountry').html(JSON.parse(respons)[0].country);
                $('#conpincode').html(JSON.parse(respons)[0].pincode);
                $('#conaltmobile').html(JSON.parse(respons)[0].altMobile);
                $('#conphoto').html(JSON.parse(respons)[0].photo);
                $('#userContractID').val(JSON.parse(respons)[0].user_id);
                $('#userContractIDa').val(JSON.parse(respons)[0].user_id);
                // console.log(JSON.parse(respons)[0].contractorID);
            }
        })
    }

</script>
@endsection

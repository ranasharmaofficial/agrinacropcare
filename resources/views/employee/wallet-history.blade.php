@extends('employee.layouts.master')
@section('title','Wallet History')
@section('content')
 <div class="page-content">
    <div class="container-fluid">

        
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
        
        <div class="row">
            <div class="col-12">
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
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="card-title text-white">@yield('title')</h4>
                    </div>
                    <div class="card-body">
                       
                        <div class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="table-dark">
                                <tr>
                                    <th>Sl.No.</th>
                                    <th>Employee&nbsp;ID</th>
                                    <th>Project</th>
                                    <th>Paid by</th>
                                    <th>Amount</th>
                                    <th>CR/DR</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($wallethistory as $key => $data)
                               
                                <tr>
                                    <td>#{{($wallethistory->currentpage()-1) * $wallethistory->perpage() + $key + 1}}</td>
                                    <td>{{$data->employee_id}}</td>
                                    <td>{{$data->work_id}}</td>
                                    <td>{{$data->paid_by}}</td>
                                    <td>Rs&nbsp;{{$data->amount}}</td>
                                    <td><span style="color:green">{{$data->cr_dr}}</span></td>
                                    {{-- <td>
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
                                    </td> --}}
                                    
                                     
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="7">
                                        <nav aria-label="...">
                                            <ul class="pagination justify-content-end mb-0">
                                                {{$wallethistory->links();}}
                                            </ul>
                                        </nav>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
     </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

@endsection

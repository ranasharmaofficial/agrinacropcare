@extends('admin.layouts.master')
@section('title','Cattle Doctor List')
@section('content')
<style>
    img, svg {
    vertical-align: middle;
    height: 10px;
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
                            <li class="breadcrumb-item"><a href="{{url('dashboard/home')}}">Dashboard</a></li>
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
                    <div class="card-header bg-danger rounded">
                        <h3 class="card-title text-white">@yield('title')</h3>
                        <p class="p-0 m-0 text-white">Total Doctor: <b>{{$cattle_doctor_list->total();}}</b>, Page No: <b>{{$cattle_doctor_list->currentPage();}}</b></p>
						
                    </div>
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
                    <div class="card-body">

                        <form method="get" style="float: right;">
                            <div class="app-search">
                                <input name="search" value="{{$sort_search}}" type="text" class="form-control" placeholder="Search here...">
                                <span id="search_icons" class="ri-search-line"></span>
                            </div>
                        </form>
                        <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr class="bg-dark text-white">
                                <th>Sl.No</th>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Password</th>
                                <th>State</th>
                                <th>District</th>
                                <th>Block</th>
                                <th>Pin</th>
                                <th>Address</th>
                                <th>Action</th>
                               </tr>
                            </thead>


                            <tbody>
                                @foreach ($cattle_doctor_list as $key => $item)
                                <tr>
                                    <td>{{($cattle_doctor_list->currentpage()-1) * $cattle_doctor_list->perpage() + $key + 1}}</td>
                                    <td>{{$item->user_id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->mobile}}</td>
                                    <td>{{$item->password}}</td>
                                    <td>{{$item->state_name}}</td>
                                    <td>{{$item->districtName}}</td>
                                    <td>{{$item->block_name}}</td>
                                    <td>{{$item->pincode}}</td>
                                    <td>{{$item->address}}</td>
                                    <td><a title="View Details" href="{{url('admin/cattle-doctor-view/'.$item->user_id)}}"><i class="ri-eye-line"></i></a></td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="7">
                                        <nav aria-label="...">
                                            <ul class="pagination justify-content-end mb-0">
                                                {{$cattle_doctor_list->links();}}
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

@endsection

@extends('admin.layouts.master')
@section('title','Kisan List')
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
                        <p class="p-0 m-0 text-white">Total Data: <b>{{$kisan_loan->total();}}</b>, Page No: <b>{{$kisan_loan->currentPage();}}</b></p>
						<a style="float:right;" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="btn btn-primary btn-rounded btn-sm" href="{{url('admin/add-state')}}">Add State</a>
                    </div>
                    <div class="card-body table-responsive"> 
<form method="get" style="float: right;">
                            <div class="app-search">
                                <input name="search" value="{{$sort_search}}" type="text" class="form-control" placeholder="Search here...">
                                <span id="search_icons" class="ri-search-line"></span>
                            </div>
                        </form>						
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr class="bg-dark text-white">
                                <th class="text-center">Sl. No.</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Mobile</th>
                                <th class="text-center">Aadhar</th>
                                <th class="text-center">Pan</th>
                                <th class="text-center">Apply Date</th>
								{{-- <th class="text-center">Action</th>--}}
                            </tr>
                            </thead>
                            <tbody>
								@foreach ($kisan_loan as $key => $data)
								<tr class="text-center">
									<td>{{($kisan_loan->currentpage()-1) * $kisan_loan->perpage() + $key + 1}}</td>
									<td>{{$data->name}}</td>
									<td>{{$data->mobile}}</td>
									<td><img src="{{asset('uploads/kisanloan').'/'.$data->aadhar}}" style="height:100px;"></td>
									<td><img src="{{asset('uploads/kisanloan').'/'.$data->pan}}" style="height:100px;"></td>
									<td>{{$data->created_at->format('d-m-Y')}}</td>
									{{--<td><a href="{{url('admin/edit-state_list/'.$data->id_state_list)}}" class="me-3 text-primary" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit" aria-label="Edit"><i class="mdi mdi-pencil font-size-18"></i></a></td>--}}
										
								</tr>
								@endforeach
								<tr>
									<td colspan="7">
										<nav aria-label="...">
											<ul class="pagination justify-content-end mb-0">
												{{$kisan_loan->links();}}
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

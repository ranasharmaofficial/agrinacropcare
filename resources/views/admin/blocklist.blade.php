@extends('admin.layouts.master')
@section('title','Block List')
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
                        <p class="p-0 m-0 text-white">Total Data: <b>{{$block->total();}}</b>, Page No: <b>{{$block->currentPage();}}</b></p>
						
                    </div>
                    <div class="card-body table-responsive"> 
						<form method="get" style="float: right;">
                            <div class="app-search">
                                <input name="search" value="{{$sort_search}}" type="text" class="form-control" placeholder="Search here...">
                                <span id="search_icons" class="ri-search-line"></span>
                            </div>
                        </form>					
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="thead-dark bg-danger text-white">
                            <tr>
                                <th class="text-center">Sl. No.</th>
                                <th class="text-center">District Name</th>
                                <th class="text-center">Block Name</th>
                               <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
								@foreach ($block as $key => $data)
								<tr>
									<td class="text-center">{{($block->currentpage()-1) * $block->perpage() + $key + 1}}</td>
									<td class="text-center">{{$data->districtName}}</td>
									<td class="text-center">{{$data->name}}</td>
									{{--<td>{{$data->created_at->format('d-m-Y')}}</td>--}}
									<td class="text-center"><a href="{{url('admin/edit-block/'.$data->id)}}" class="me-3 text-primary" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit" aria-label="Edit"><i class="mdi mdi-pencil font-size-18"></i></a></td>
										
								</tr>
								@endforeach
								<tr>
									<td colspan="7">
										<nav aria-label="...">
											<ul class="pagination justify-content-end mb-0">
												{{$block->links();}}
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

@extends('admin.layouts.master')
@section('title','Update Block')
@section('content')
    
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 text-primary">@yield('title')</h4>

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
        
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="col-sm-12">
                        <div class="flash-message p-2">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if (Session::has('alert-' . $msg))
                                    <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                                        {{ Session::get('alert-' . $msg) }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <form method="post" action="{{route('admin.updateBlockData')}}" enctype="multipart/form-data" class="card-body">
                        @csrf
                        <input type="hidden" name="blockid" value="{{$blockDetails->id}}" required />
                        <h4 class="card-title font-weight-bold text-uppercase text-danger">Block Details:-</h4><hr>
                        <div class="container">
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label for="fullname" class="col-form-label">District <star>*</star></label>
									<select class="form-control" required name="dist_name">
										@foreach (\App\Models\District::all() as $district)
										 <option value="{{ $district->id_district }}" @if($blockDetails->district_id == $district->id_district) selected @endif>{{ $district->name }}</option>
										 @endforeach
									</select>
                                    <small class="form-text text-danger">@error('dist_name') {{$message}} @enderror</small>
                                </div> 
								<div class="col-sm-12">
                                    <label for="fullname" class="col-form-label">Block <star>*</star></label>
                                    <input class="form-control" type="text" required name="block_name" value="{{$blockDetails->name}}" placeholder="" id="fullname">
                                    <small class="form-text text-danger">@error('block_name') {{$message}} @enderror</small>
                                </div>
                                <div class="col-sm-12 my-3">
                                    <button class="btn btn-primary btn-sm">Update</button>
                                </div>
                            </div>
                        </div>
					</form>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
     </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection

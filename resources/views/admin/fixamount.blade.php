@extends('admin.layouts.master')
@section('title', 'Fix Amount')
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
                        <div class="p-2">
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
						</div>
                            <div class="container mt-3">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-header bg-info text-white">Crop Insurance Amount</div>
                                            <div class="card-body">
                                                <form method="post" action="{{ route('updateCropInsurance') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group mb-3">
                                                        <label for="cropInsurance">Crop Insurance</label>
                                                        <input value="{{$amount_details->crop_insurance_amount}}" class="form-control" id="cropInsurance" type="text" name="crop_insurance_amount" />
                                                        <small class="form-text text-danger">@error('crop_insurance_amount') {{$message}} @enderror</small>
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <button type="submit" class="btn btn-info btn-sm">Submit</button>
                                                    </div>
                                                </form>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-header bg-danger text-white">Cattle Insurance Amount</div>
                                            <div class="card-body">
                                                <form method="post" action="{{ route('updateCattleInsurance') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group mb-3">
                                                        <label for="cattleInsurance">Cattle Insurance </label>
                                                        <input value="{{$amount_details->cattle_insurance_amount}}" class="form-control" id="cattleInsurance" type="text" name="cattle_insurance_amount" />
                                                        <small class="form-text text-danger">@error('cattle_insurance_amount') {{$message}} @enderror</small>
                                                    </div>
                                                    <div class="form-group text-center ">
                                                        <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-header bg-primary text-white">Agent Amount</div>
                                            <div class="card-body">
                                                <form method="post" action="{{ route('updateAgentAmount') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group mb-3">
                                                        <label for="agentAmount">Agent Amount </label>
                                                        <input value="{{$amount_details->agent_amount}}" class="form-control" id="agentAmount" type="text" name="agent_amount" />
                                                        <small class="form-text text-danger">@error('agent_amount') {{$message}} @enderror</small>
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <script type="text/javascript">
        headerlogo.onchange = evt => {
            const [file] = headerlogo.files
            if (file) {
                headerlogoview.src = URL.createObjectURL(file);
            }
        }

        footerlogo.onchange = evt => {
            const [file] = footerlogo.files
            if (file) {
                footerlogoview.src = URL.createObjectURL(file);
            }
        }

        faviconlogo.onchange = evt => {
            const [file] = faviconlogo.files
            if (file) {
                faviconlogoview.src = URL.createObjectURL(file);
            }
        }
    </script>
@endsection

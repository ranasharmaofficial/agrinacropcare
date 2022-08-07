@extends('dashboard.layout.master')
@section('title')
    Crop Insurance
@endsection
@section('header-title')
    Crop Insurance
@endsection

@section('content')
    <main role="main" class="ion-content ion-myprofile">

        <div class="card mb-6">
            <div class="card-header font-weight-bold text-center text-white bg-success">
                Apply for Crop Insurance
            </div>
            <div class="card-body p-0 pt-2" style="height: 150px;">
                <form action="{{ route('dashboard.uploadCropInsuranceData') }}" autocomplete="off" method="post"
                    enctype="multipart/form-data" class="p-2">
                    {{-- <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if (Session::has('alert-' . $msg))
                            <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                                {{ Session::get('alert-' . $msg) }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                            </div>
                        @endif
                    @endforeach
                </div> --}}
                    @csrf

                    <div class="text-field mb-4" >
                        <input type="text" autofocus required name="employee_id" class="form-control" title="Name"
                            value="{{ old('employee_id') }}" />
                        <label>Employee Code <span class="danger">*</span></label>
                        <span class="text-danger form-text">
                            @error('employee_id')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="btn btn-block ion-no-margin text-white" style="background-color: #003049" id="login"><a class="text-white" href="{{url('dashboard/crop_insurance_stepTwo')}}">Proceed</a>
                        </button>
                </form>
            </div>
        </div>
        </div>
    </main>
@endsection

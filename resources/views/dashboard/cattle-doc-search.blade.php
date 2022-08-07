@extends('dashboard.layout.master')
@section('title')
    Cattle Doctor
@endsection
@section('header-title')
    Cattle Doctor
@endsection

@section('content')
    <main role="main" class="ion-content ion-myprofile">

        <div class="card mb-6">
            <div class="card-header font-weight-bold text-center text-white bg-success">
                Look for Cattle Doctor
            </div>
            <div class="card-body p-0">
                <form action="{{ route('dashboard.crop-doc-search-details') }}" autocomplete="off" method="get"
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
                    <div class="text-field">
                        <input type="tel" min="6" maxlength="6" required name="pin" class="form-control"
                            title="Pin" value="" />
                        <label>Pin Code <span class="danger">*</span></label>
                        <span class="text-danger form-text">
                            @error('mobile')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>



                    <button type="submit" class="btn btn-block ion-no-margin text-white" style="background-color: #003049;" id="login"><i class="fa fa-search" aria-hidden="true"></i> SEARCH</button>
                </form>
                <div class="p-3 mb-3">
                    {{-- <div class="float-left">
                    <a href="{{url('dashboard/auth/login')}}" class="text-center mt-3 text-primary">Already Registered? Login Now</a>
                </div> --}}
                    {{-- <div class="float-right">
                    <a href="{{url('dashboard/register')}}" class="text-center mt-3 text-primary">Register</a>
                </div> --}}
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection

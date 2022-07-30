@extends('dashboard.layout.master')
@section('title')Agriculture Shop @endsection
@section('header-title')Agriculture Shop @endsection

@section('content')
    <main role="main" class="ion-content ion-myprofile">
         
        <div class="card mb-6">
       <div class="card-header font-weight-bold text-center text-success">
          Look for Agriculture Shop
       </div>
        <div class="card-body p-0">
            <form action="{{route('dashboard.agriShopSearch')}}" autocomplete="off" method="get" enctype="multipart/form-data" class="p-2">
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
                    <select type="text" autofocus required name="state" class="form-control" title="State" value="">
                        <option selected>---Select State---</option>
                        <option value="1">Bihar</option>
                    </select>
                    {{-- <label>State <span class="danger">*</span></label> --}}
                </div>
                <div class="text-field">
                    <select type="text" autofocus required name="district" class="form-control" title="district" value="">
                        <option selected>---Select District---</option>
                        @foreach ($districtlist as $citem)
                                <option value="{{$citem->id_district }}">{{$citem->name}}</option>                                            
                            @endforeach 
                    </select>
                </div>
				<div class="text-field">
                    <input type="tel" min="6" maxlength="6" required name="pin" class="form-control" title="Pin" value="" />
                    <label>Pin Code <span class="danger">*</span></label>
                    <span class="text-danger form-text">@error('mobile') {{$message}} @enderror</span>
                </div>
				
				
                
                <button type="submit" class="btn btn-block btn-oringe ion-no-margin" id="login">SEARCH</button>
            </form>
            <div class="p-3 mb-3">                
                {{-- <div class="float-left">
                    <a href="{{url('dashboard/auth/login')}}" class="text-center mt-3 text-primary">Already Registered? Login Now</a>
                </div> --}}
                {{--<div class="float-right">
                    <a href="{{url('dashboard/register')}}" class="text-center mt-3 text-primary">Register</a>
                </div>--}}
            </div> 
        </div>       
    </div>
	</div>
    </main>
	 
@endsection

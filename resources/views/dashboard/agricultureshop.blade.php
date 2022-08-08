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
                    <select type="text" autofocus required name="state" id="state" class="form-control" title="State" value="">
                        <option selected>---Select State---</option>
                         @foreach ($statelist as $citem)
                                        <option value="{{ $citem->id }}">{{ $citem->name }}</option>
                                    @endforeach
                    </select>
                    {{-- <label>State <span class="danger">*</span></label> --}}
                </div>
                <div class="text-field">
                    <select type="text" id="school_id" required name="district" class="form-control" title="district" value="">
                        <option disabled value="0" selected>---Select District---</option>
                        
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
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        jQuery(document).ready(function() {

            jQuery('#school_id').change(function() {
                let school = jQuery(this).val();
                let datas = "";
                // console.log(school)
                // $('#sub_category').empty();
                // $('#sub_category').append(`<option value="0" disabled selected>Processing...</option>`);
                jQuery.ajax({
                    url: '{{ url('getBlockNames') }}',
                    type: 'post',
                    //dataType: "json",
                    data: 'school=' + school + '&_token={{ csrf_token() }}',
                    success: function(result) {
                        // console.log(result);
                        if (result == '') {
                            datas += '<option value="0">Not Found.</option>';
                        } else {
                            // console.log(result);
                            datas += '<option selected disabled>---Select Block---</option>';
                            $.each(result, function(i) {
                                datas += '<option value="' + result[i].id + '">' +
                                    result[i].name + '</option>';
                                console.log(result);
                            });
                        }
                        jQuery('#class_id').html(datas);
                    }
                });
            });
			
			jQuery('#state').change(function() {
                let state = jQuery(this).val();
                let datas = "";
                console.log(state)
                // $('#sub_category').empty();
                // $('#sub_category').append(`<option value="0" disabled selected>Processing...</option>`);
                jQuery.ajax({
                    url: '{{ url('getDistrictName') }}',
                    type: 'post',
                    //dataType: "json",
                    data: 'state=' + state + '&_token={{ csrf_token() }}',
                    success: function(result) {
                        // console.log(result);
                        if (result == '') {
                            datas += '<option value="0">Not Found.</option>';
                        } else {
                            // console.log(result);
                            datas += '<option selected disabled>---Select District---</option>';
                            $.each(result, function(i) {
                                datas += '<option value="' + result[i].id_district + '">' +
                                    result[i].name + '</option>';
                                console.log(result);
                            });
                        }
                        jQuery('#school_id').html(datas);
                    }
                });
            });


        });
    </script>
    </main>
	 
@endsection

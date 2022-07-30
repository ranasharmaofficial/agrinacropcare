@extends('dashboard.auth.auth-master')
@section('title', 'Agriculture Retailer Registration')
@section('content')
<style>
   
</style>
<main role="main" class="ion-checkout">
    <div class="row mt-3">
        <div class="col-sm-12 text-center">
            <img style="margin-top:-45px;" src="{{asset('front_assets/img/logo.png')}}" alt="Logo" class="img-login-logo">
        </div>
    </div>
    <div class="card mb-6">
       <div class="card-header font-weight-bold text-center text-success">
           Agriculture Retailer Registration
       </div>
        <div class="card-body p-0">
            <form action="{{route('dashboard.uploadAgriRetailerRegData')}}" autocomplete="off" method="post" class="p-2">
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
                <div class="ion-list ion-no-margin ion-no-padding">
                <div class="text-field">
                    <input type="text" required name="name" class="@error('name') is-invalid @enderror" title="Name" value="{{old('name')}}" />
                    <label>Name <span class="danger">*</span></label>
                    <span class="text-danger form-text">@error('name') {{$message}} @enderror</span>
                </div>
                </div>
                <div class="ion-list ion-no-margin">
                <div class="text-field">
                    <input required pattern="[6789][0-9]{9}" min="10" maxlength="10" type="tel" required name="mobile" title="Mobile" value="{{old('mobile')}}" />
                    <label>Mobile Number<span class="danger">*</span></label>
                    <span class="text-danger form-text">@error('mobile') {{$message}} @enderror</span>
                </div>
                <div class="ion-list ion-no-margin">
                    <div class="text-field">
                        <input type="text" required name="address" title="Full Address" value="{{old('address')}}" />
                        <label>Full Address<span class="danger">*</span></label>
                        <span class="text-danger form-text">@error('address') {{$message}} @enderror</span>
                    </div>
                </div>
				
				<div class="ion-list ion-no-margin">
                    <div class="text-field">
                         <select class="select" required type="text" name="state" id="state">
                            <option selected disabled>---Select State----</option>
                                <option value="1">Bihar</option>                                            
                            </select>
							 
                        <span class="text-danger form-text">@error('state') {{$message}} @enderror</span>
                    </div>
                </div>
				<div class="ion-list ion-no-margin">
                    <div class="text-field">
                        <select class="select" required type="text" name="district" id="school_id">
                            <option selected disabled>---Select District----</option>
                            @foreach ($districtlist as $citem)
                                <option value="{{$citem->id_district }}">{{$citem->name}}</option>                                            
                            @endforeach                                            
                        </select>
						<span class="text-danger form-text">@error('district') {{$message}} @enderror</span>
                    </div>
                </div>
				<div class="ion-list ion-no-margin">
                    <div class="text-field">
                         <select class="select" required type="text" name="block" id="class_id">
								<option selected disabled>---Select Block----</option>
								                                            
                            </select>
							 
                        <span class="text-danger form-text">@error('block') {{$message}} @enderror</span>
                    </div>
                </div>
				<div class="ion-list ion-no-margin">
                    <div class="text-field">
                        <input type="text" required name="panchayat" title="Panchayat" value="{{old('panchayat')}}" />
                        <label>Panchayat<span class="danger">*</span></label>
                        <span class="text-danger form-text">@error('panchayat') {{$message}} @enderror</span>
                    </div>
                </div>
				<div class="ion-list ion-no-margin">
                    <div class="text-field">
                        <input type="text" required name="pin_code" title="Panchayat" value="{{old('pin_code')}}" />
                        <label>Pin Code<span class="danger">*</span></label>
                        <span class="text-danger form-text">@error('pin_code') {{$message}} @enderror</span>
                    </div>
                </div>
				<div class="ion-list ion-no-margin">
                    <div class="text-field">
                        <input type="text" required name="experience" title="Experience" value="{{old('experience')}}" />
                        <label>Experience<span class="danger">*</span></label>
                        <span class="text-danger form-text">@error('experience') {{$message}} @enderror</span>
                    </div>
                </div>
                 
                
                <button type="submit" class="btn btn-block btn-oringe ion-no-margin" id="login">Register Now</button>
            </form>
            <div class="p-3 mb-3">                
                <div class="float-left">
                    <a href="{{url('dashboard/auth/login')}}" class="text-center mt-3 text-primary">Already Registered? Login Now</a>
                </div>
                {{--<div class="float-right">
                    <a href="{{url('dashboard/register')}}" class="text-center mt-3 text-primary">Register</a>
                </div>--}}
            </div> 
        </div>       
    </div>
	</div>
	@include('dashboard.partials.gotohome')
 </main>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
 <script>
  
    jQuery(document).ready(function(){

        jQuery('#school_id').change(function(){
        let school=jQuery(this).val();
        let datas = "";
        console.log(school)
// $('#sub_category').empty();
// $('#sub_category').append(`<option value="0" disabled selected>Processing...</option>`);
        jQuery.ajax({
            url:'{{url('getBlockNames')}}',
            type:'post',
            //dataType: "json",
            data:'school='+school+'&_token={{csrf_token()}}',
            success:function(result){
                // console.log(result);
                if (result == '') {
                    datas += '<option>Not Found.</option>';
                } else{
                    console.log(result);
                    datas +='<option selected disabled>---Select Block---</option>';
                    $.each(result, function (i) {
                        datas += '<option value="'+result[i].id+'">'+result[i].name+'</option>';
                        console.log(result);
                    });                    
                }
                jQuery('#class_id').html(datas);
            }
        });
    });

    
    });
</script>

@endsection
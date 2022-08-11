@extends('dashboard.layout.master')
@section('title')Kisan Loan @endsection
@section('header-title')Kisan Loan @endsection

@section('content')
    <main role="main" class="ion-content ion-myprofile">
         
        <div class="card mb-6">
       <div class="card-header font-weight-bold text-center text-success">
          Apply for Kisan Loan
       </div>
        <div class="card-body p-0">
            <form action="{{route('dashboard.applyForKisanLoan')}}" autocomplete="off" method="post" enctype="multipart/form-data" class="p-2">
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
                    <input type="text" autofocus required name="name" class="form-control" title="Name" value="{{old('name')}}" />
                    <label>Name <span class="danger">*</span></label>
                    <span class="text-danger form-text">@error('name') {{$message}} @enderror</span>
                </div>
				<div class="text-field">
                    <input type="tel" pattern="[6789][0-9]{9}" min="10" maxlength="10" required name="mobile" class="form-control" title="Mobile" value="{{old('Mobile')}}" />
                    <label>Mobile <span class="danger">*</span></label>
                    <span class="text-danger form-text">@error('mobile') {{$message}} @enderror</span>
                </div>
				
				<div style="margin-top: 36px;" class="text-field">
                    <input onchange="readAadhar(this);" type="file" accept="image/png, image/gif, image/jpeg, image/jpg"  required name="aadhar" class="form-control" title="Aadhar Card Picture" />
                    <label style="top:-19px;">Aadhar Card Picture <span class="dob">*</span></label>
                    <span class="text-danger form-text">@error('aadhar') {{$message}} @enderror</span>
                </div>
                <img style="width:auto;height:100px;padding-top:5px;padding-bottom:2px;" class="img-fluid" id="aadhar"/>
					<script>
		function readAadhar(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#aadhar')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
					</script>
                <div style="margin-top: 36px;" class="text-field">
                    <input onchange="readURL(this);" type="file" accept="image/png, image/gif, image/jpeg, image/jpg"  required name="pan" class="form-control" title="Aadhar Card Picture" />
                    <label style="top:-19px;">Pan Card Picture <span class="dob">*</span></label>
                    <span class="text-danger form-text">@error('pan') {{$message}} @enderror</span>
                </div>
				<img style="width:auto;height:100px;padding-top:5px;padding-bottom:2px;" class="img-fluid" id="pancard"/>
					<script>
		function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#pancard')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
					</script>
                
                <button type="submit" class="btn btn-block btn-oringe ion-no-margin" id="login">APPLY</button>
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

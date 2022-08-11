@extends('dashboard.layout.master')
@section('title')
    Crop Insurance
@endsection
@section('header-title')
    Crop Insurance
@endsection

@section('content')
    <main role="main" class="ion-content ion-myprofile">

        <div class="card" style="margin-bottom: 65px;">
            <div class="card-header font-weight-bold text-center text-white bg-success">
                Apply for Crop Insurance
            </div>
            <div class="card-body p-0">
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
                   <h6 class="register_heading">Proposor Details</h6>
                    <hr>
                    <div class="text-field">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-success">
                                    <select style="padding:0px;border:none;" class="bg-success text-white"
                                        name="salutation">
                                        <option selected="selected" value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value="Miss">Miss</option>
                                    </select>
                                    <span class="text-danger form-text">
                                        @error('salutation')
                                            {{ $salutation }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <input type="text" name="name" value="{{ old('name') }}" required class="form-control" id="Name"
                                placeholder="Enter Your Name">
                        </div>
                        <span class="text-danger form-text">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    @php
                    $mobile_no = Session::get('mobilenumber');
                @endphp
                    <input type="text" name="type" value="1">
                    <input type="text" name="employee_id" value="{{ $mobile_no }}">
                    <div class="text-field" style="margin-top: 40px;">
                        <label class="text-danger" style="top:-22px;">Gender <span class="danger">*</span></label>
                        <select class="select w-100" required type="text" name="gender" id="class_id">
                            <option value="male" selected>Male</option>
                            <option value="female">Female</option>
                        </select>
                        <span class="text-danger form-text">
                            @error('plan_details')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="text-field" style="margin-bottom: 30px;">
                        <input type="tel" pattern="[6789][0-9]{9}" required name="mobile" class="form-control"
                            title="Mobile" value="{{ old('mobile') }}" />
                        <label>Mobile <span class="danger">*</span></label>
                        <span class="text-danger form-text">
                            @error('mobile')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="text-field">
                        <input type="date" required name="dob" class="form-control" title="Date of Birth"
                            value="{{ old('dob') }}" />
                        <label style="top:-20px;">Date of Birth <span class="dob">*</span></label>
                        <span class="text-danger form-text">
                            @error('dob')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="text-field">
                        <input type="tel" min="6" maxlength="6" required name="pincode" id="pincode"
                            class="form-control" title="Date of Birth" value="{{ old('pincode') }}" />
                        <label>Pin Code <span class="dob">*</span></label>
                        <span class="text-danger form-text">
                            @error('pincode')
                                {{ $message }}
                            @enderror
                        </span>
                        <span class="text-warning form-text font-weight-bold" id="wrong_pincode"></span>
                    </div>
                    <div class="text-field">
                        <input type="text" onclick="get_state_city()" required name="address" class="form-control"
                            title="Address" value="{{ old('address') }}" />
                        <label>Address <span class="dob">*</span></label>
                        <span class="text-danger form-text">
                            @error('address')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="text-field">
                        <input type="text" required name="district" id="city" class="form-control" title="District"
                            value="{{ old('district') }}" />
                        <label>District <span class="dob">*</span></label>
                        <span class="text-danger form-text">
                            @error('District')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="text-field">
                        <input type="text" required name="state" id="state" class="form-control" title="State"
                            value="{{ old('state') }}" />
                        <label>State <span class="dob">*</span></label>
                        <span class="text-danger form-text">
                            @error('state')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="text-field" style="margin-bottom: 30px;">
                        <input type="text" required name="crops_insurred" class="form-control"
                            title="Major Crops Insurred" value="{{ old('crops_insurred') }}" />
                        <label>Major Crops Insurred <span class="dob">*</span></label>
                        <span class="text-danger form-text">
                            @error('crops_insurred')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div style="margin-top:5px;"class="text-field">
                        <input onchange="loadFile(event)" type="file" required name="aadhar_card"
                            class="form-control" title="Aadhar Card Picture" />
                        <label style="top:-20px;">Aadhar Card Picture <span class="dob">*</span></label>
                        <span class="text-danger form-text">
                            @error('aadhar_card')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    {{-- <div class="form-group">
                    <img style="width:auto;height:100px;padding-top:5px;padding-bottom:2px;" class="img-fluid" id="picone"/>
					<script>
						var loadFile = function(event) {
							var input = document.getElementById('picone');
							picone.src = URL.createObjectURL(event.target.files[0]);
						};
					</script>
                  </div> --}}
                    <h6 class="register_heading">Plan Details</h6>
                    <hr>
                    <div class="text-field" style="margin-top: 40px;">
                        <label class="text-danger" style="top:-22px;">Tenure <span class="danger">*</span></label>
                        <select class="select w-100" required type="text" name="tenure" id="class_id">
                            <option>---Select Plan---</option>
                            <option value="1">1 Year</option>
                        </select>
                        <span class="text-danger form-text">
                            @error('tenure')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="text-field" style="margin-bottom: 30px;">
                        <input type="text" required name="total_sum_insurred" class="form-control" title="Father"
                            value="{{ old('total_sum_insurred') }}" />
                        <label>Total Sum Insurred </label>
                        <span class="text-danger form-text">
                            @error('total_sum_insurred')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="text-field" style="margin-bottom: 30px;">
                        <input type="text" required name="gross_premium" class="form-control" title="Father"
                            value="{{ old('gross_premium') }}" />
                        <label>Gross Premium in(Rs)</label>
                        <span class="text-danger form-text">
                            @error('gross_premium')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <h6 class="register_heading">Nominee Details</h6>
                    <hr>
                    <div class="text-field">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-success">
                                    <select style="padding:0px;border:none;" class="bg-success text-white"
                                        name="nominee_salutation">
                                        <option selected="selected" value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value="Miss">Miss</option>
                                    </select>
                                </div>
                            </div>
                            <input type="text" name="nominee_name" class="form-control" id="Name"
                                placeholder="Enter Your Name">
                        </div>
                    </div>
                    <div class="text-field" style="margin-bottom: 30px;">
                        <input type="text" required name="nominee_father" class="form-control" title="Father"
                            value="{{ old('nominee_father') }}" />
                        <label>Father's Name <span class="danger">*</span></label>
                        <span class="text-danger form-text">
                            @error('nominee_father')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="text-field">
                        <input type="date" name="nominee_dob" class="form-control" title="Date of Birth"
                            value="{{ old('nominee_dob') }}" />
                        <label style="top:-20px;" class="text-danger">Date of Birth <span class="dob">*</span></label>

                    </div>
                    <div class="text-field">
                        <select class="select w-100" required type="text" name="nominee_relation">
                            <option>---Select Relationship with Proposer---</option>
                            <option>Father</option>
                            <option>Mother</option>
                            <option>Brother</option>
                            <option>Sister</option>
                            <option>Uncle</option>
                            <option>Aunt</option>
                            <option>Other</option>
                        </select>

                        <span class="text-danger form-text">
                            @error('nominee_relation')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="btn btn-block ion-no-margin text-white" id="login"
                        style="background-color: #003049">Proceed</button>
                </form>
                {{-- <div class="p-3 mb-3">
                    <div class="float-left">
                        <a href="{{ url('dashboard/auth/login') }}" class="text-center mt-3 text-primary">Already
                            Registered? Login Now</a>
                    </div> --}}
                {{-- <div class="float-right">
                    <a href="{{url('dashboard/register')}}" class="text-center mt-3 text-primary">Register</a>
                </div> --}}
            </div>
        </div>
    </main>
@endsection

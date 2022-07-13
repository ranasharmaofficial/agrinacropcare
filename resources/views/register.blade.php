@extends('master')

@section('title')Register - DBT Work @endsection

@section('description')DBT Work Description @endsection


@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{url('')}}">Home</a></li>
          <li>Register</li>
        </ol>
        <h2>Register</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        

        <div class="row justify-content-center">

          <div class="col-lg-7">
            
           <div class="info-box p-3">
            <h3 class="text-center p-0 m-0">Register your Account</h3>
            <p>&nbsp;</p>
            <div class="flash-message">
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
            </div>
            <form action="{{route('studentRegister')}}" method="post" class="form-horizontal">
                @csrf
                <div class="colum-row row">
                    <div class="col-sm-6 form-group my-2">
                        {{-- <label class="float-left" for="">Name</label> --}}
                        <input type="text" id="name" value="{{old('name')}}" name="name" class="form-control" placeholder="Teacher's Name" required>
                            <span class="form-text text-danger">@error('name')
                                {{$message}}
                            @enderror</span>
                    </div>
                    <div class="col-sm-6 form-group my-2">
                        {{-- <label class="float-left" for="">Email</label> --}}
                        <input type="email" id="email" value="{{old('email')}}" name="email" class="form-control" placeholder="Email"
                            required>
                            <span class="form-text text-danger">@error('email')
                                {{$message}}
                            @enderror</span>
                    </div>
                    <div class="col-sm-6 form-group my-2">
                        {{-- <label class="float-left" for="">Email</label> --}}
                        <select class="form-select" required type="text" name="state" id="state">
                            <option selected disabled>---Select State----</option>
                                <option value="1">Bihar</option>                                            
                            </select>
                            <span class="form-text text-danger">@error('state')
                                {{$message}}
                            @enderror</span>
                    </div>
                    <div class="col-sm-6 form-group my-2">
                        {{-- <label class="float-left" for="">Email</label> --}}
                        <select class="form-select" required type="text" name="district" id="school_id">
                            <option selected disabled>---Select District----</option>
                            @foreach ($districtlist as $citem)
                                <option value="{{$citem->id_district }}">{{$citem->name}}</option>                                            
                            @endforeach
                        </select>
                            <span class="form-text text-danger">@error('district')
                                {{$message}}
                            @enderror</span>
                    </div>
                    <div class="col-sm-6 form-group my-2">
                        {{-- <label class="float-left" for="">Email</label> --}}
                        <select class="form-select" required type="text" name="block" id="class_id">
                                            <option selected disabled>---Select Block----</option>
                                            {{-- @foreach ($classes as $citem)
                                                <option value="{{$citem->id}}">{{$citem->class_name}}</option>                                            
                                            @endforeach --}}
                                        </select>
                    </div>
                    <div class="col-sm-6 form-group my-2">
                        {{-- <label class="float-left" for="">Email</label> --}}
                        <input type="text" id="school" value="{{old('school_name')}}" name="school_name" class="form-control" placeholder="School"
                            required>
                            <span class="form-text text-danger">@error('school_name')
                                {{$message}}
                            @enderror</span>
                    </div>
                    <div class="col-sm-12 form-group my-2">
                        {{-- <label class="float-left" for="">Email</label> --}}
                        <input type="text" id="school" value="{{old('school_id')}}" name="school_id" class="form-control" placeholder="School UDISE Code"
                            required>
                            <span class="form-text text-danger">@error('school_id')
                                {{$message}}
                            @enderror</span>
                    </div>
                    <div class="col-sm-6 form-group my-2">
                        <input type="tel" id="mobile" value="{{old('mobile')}}" name="mobile" class="form-control" placeholder="Mobile" required>
                        <span class="form-text text-danger"> @error('mobile'){{$message}} @enderror</span>
                    </div>
                    <div class="col-sm-6 form-group" id="otpget">
                        <button class="btn btn-info btn-sm my-2 text-secondary" onclick="getOTP()">Send OTP</button>
                    </div>
                    <div class="col-sm-6 form-group" id="otpinput" style="display: none;">
                        <input type="text" id="otp" value="{{old('otp')}}" name="otp" class="form-control" placeholder="Enter OTP" required>
                        <span class="form-text text-danger">@error('otp') {{$message}} @enderror</span>
                    </div>
                    <div class="col-sm-6 form-group">
                        <input type="password" id="password" style="display: none;" value="{{old('password')}}" name="password" class="form-control" placeholder="Password"
                            required>
                            <span class="form-text text-danger">@error('password')
                                {{$message}}
                            @enderror</span>
                    </div>
                    <div class="col-sm-6 form-group">
                        <input type="password" id="cpassword" style="display: none;" value="{{old('cpassword')}}" name="cpassword" class="form-control" placeholder="Confirm Password" required>
                            <span class="form-text text-danger">@error('cpassword')
                                {{$message}}
                            @enderror</span>
                    </div>
                </div>
                <div class="form-group col-md-12 text-center" id="mobiletakent" style="display: none;">
                    <span class="form-text text-danger" id="mobtaken"></span>
                </div>
                <div class="form-group col-md-12 text-center my-3" id="registerButton" style="display: none;">
                    <button id="submit" style="cursor: pointer;" class="btn btn-info rounded" type="submit">REGISTER</button>
                </div>
                <div class="col-sm-12 text-center">
                    <a href="{{url('login')}}">Have you already account? Login Now</a>
                </div>
             </form>
           </div>

            
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  @if (false)
  <section class="contact-section">
    <div class="container">
        <div class="row justify-content-center my-5 mx-2">
            <div class="card col-md-6 mt-3" style="background-color: rgb(248, 246, 255); box-shadow: 4px 5px #c1c1c1;">
                <div class="contact-form card-body">
                    <h3 class="text-center p-0 m-0">Register your Account</h3>
                    <p>&nbsp;</p>
                    <div class="flash-message">
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
                    </div>
                    <form action="{{route('studentRegister')}}" method="post" class="form-horizontal">
                        @csrf
                        <div class="colum-row row">
                            <div class="col-sm-6 form-group">
                               
                                <input type="text" id="name" value="{{old('name')}}" name="name" class="form-control" placeholder="Name" required>
                                    <span class="form-text text-danger">@error('name')
                                        {{$message}}
                                    @enderror</span>
                            </div>
                            <div class="col-sm-6 form-group">
                                <input type="email" id="email" value="{{old('email')}}" name="email" class="form-control" placeholder="Email"
                                    required>
                                    <span class="form-text text-danger">@error('email')
                                        {{$message}}
                                    @enderror</span>
                            </div>
                            <div class="col-sm-6 form-group">
                                <input type="tel" id="mobile" value="{{old('mobile')}}" name="mobile" class="form-control" placeholder="Mobile" required>
                                    <span class="form-text text-danger"> @error('mobile'){{$message}} @enderror</span>
                            </div>
                            <div class="col-sm-6 form-group" id="otpget">
                                <button class="btn btn-info" onclick="getOTP()"><i class="fa fa-paper-plane"></i> Send OTP</button>
                            </div>
                            <div class="col-sm-6 form-group" id="otpinput" style="display: none;">
                                <input type="text" id="otp" value="{{old('otp')}}" name="otp" class="form-control" placeholder="Enter OTP" required>
                                <span class="form-text text-danger">@error('otp') {{$message}} @enderror</span>
                            </div>
                            <div class="col-sm-6 form-group">
                                <input type="password" id="password" style="display: none;" value="{{old('password')}}" name="password" class="form-control" placeholder="Password"
                                    required>
                                    <span class="form-text text-danger">@error('password')
                                        {{$message}}
                                    @enderror</span>
                            </div>
                            <div class="col-sm-6 form-group">
                                <input type="password" id="cpassword" style="display: none;" value="{{old('cpassword')}}" name="cpassword" class="form-control" placeholder="Confirm Password" required>
                                    <span class="form-text text-danger">@error('cpassword')
                                        {{$message}}
                                    @enderror</span>
                            </div>
                        </div>
                        <div class="form-group col-md-12 text-center" id="mobiletakent" style="display: none;">
                            <span class="form-text text-danger" id="mobtaken"></span>
                        </div>
                        <div class="form-group col-md-12 text-center" id="registerButton" style="display: none;">
                            <button id="submit" style="cursor: pointer;" class="default-btn rounded" type="submit">REGISTER</button>
                        </div>
                        <div class="col-sm-12 text-center">
                            <a href="{{url('login')}}">Have you already account? Login Now</a>
                        </div>
                     </form>
                </div>
            </div>
        </div>
    </div>
</section><!-- /Contact Section -->
  @endif

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
<script class="text/javascript">
    function getOTP(){
        let mob = document.getElementById('mobile').value;
        $.ajax({
            url: '{{route('getotp')}}',
            method: 'POST',
            data: 'mobile='+mob+'&_token={{csrf_token()}}',
            success:function(response){
                console.log(response);
                document.getElementById('otpget').style="display: none";
                document.getElementById('otpinput').style="display: block";
                document.getElementById('registerButton').style="display: block";
                document.getElementById('password').style="display: block";
                document.getElementById('cpassword').style="display: block";
                document.getElementById('mobiletakent').style="display: none";
            },
            error:function(errlog){
                let mss = JSON.parse(errlog.responseText);
                // console.log(mss.errors.mobile[0]);
                document.getElementById('otpget').style="display: block";
                document.getElementById('otpinput').style="display: none";
                document.getElementById('registerButton').style="display: none";
                document.getElementById('password').style="display: none";
                document.getElementById('cpassword').style="display: none";
                document.getElementById('mobiletakent').style="display: block";
                document.getElementById('mobtaken').innerHTML = mss.errors.mobile[0];
            }
        });
    }
</script>
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
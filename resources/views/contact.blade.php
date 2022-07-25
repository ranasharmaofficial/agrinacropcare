@extends('master')

@section('title')Contact Us - Agrina Crop Care @endsection

@section('description')Agrina Crop Care Description @endsection


@section('content')
 <div id="page-header" class="content-contrast">
            <div class="page-title-container">
                <div class="background-overlay"></div>
                <div class="container centered-container">
                    <div class="centered-inner-container">
                        <h1 class="page-title">Contact Us</h1>
                        <hr class="separator small-separator">
                        <div class="heading-caption">Let's Talk Business, Get in Touch!</div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <nav class="breadcrumb">
                                <a class="breadcrumb-item" href="{{url('')}}">Home</a>
                                <span class="breadcrumb-item active">Contact</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="heading-title">
                            <h3>Get in touch <strong class="text-color">With us</strong></h3>
                        </div>
                        <p>
                            If you have any question about Agrina Crop Care or how we can help to maintenance your garden, please contact us directly by selecting from one of the below categories that is the most relevant to your inquiry and fill
                            our short feedback form.
                        </p>
                    </div>
                    <div class="col-lg-8 col-md-12">
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
                        <form class="contact-form" method="POST" action="{{route('enquiryContact')}}">
							@csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" required value="{{old('name')}}" name="name" id="name" class="form-control" placeholder="Your name">
                                    </div>
									 <span class="form-text text-danger">@error('name')
                                        {{$message}}
                                    @enderror</span>
                                    <div class="form-group">
                                        <input type="email" required value="{{old('email')}}" name="email" id="email" class="form-control" placeholder="Your Email">
                                    </div>
									 <span class="form-text text-danger">@error('email')
                                        {{$message}}
                                    @enderror</span>
                                    <div class="form-group no-margin-lg">
                                        <input type="text" required value="{{old('subject')}}" name="subject" id="subject" class="form-control" placeholder="Subject">
                                    </div>
									 <span class="form-text text-danger">@error('subject')
                                        {{$message}}
                                    @enderror</span>
                                </div>
                                <div class="col-sm-6">
								<div class="form-group">
                                        <input type="tel" min="10" required value="{{old('mobile')}}"  maxlength="10" pattern="[6789][0-9]{9}" name="mobile" id="mobile" class="form-control" placeholder="Your name">
                                    </div>
									 <span class="form-text text-danger">@error('mobile')
                                        {{$message}}
                                    @enderror</span>
                                    <div class="form-group">
                                        <textarea name="message" required id="message" class="form-control" placeholder="Your Message">{{old('name')}}</textarea>
                                    </div>
									 <span class="form-text text-danger">@error('message')
                                        {{$message}}
                                    @enderror</span>
                                    <button type="submit" id="buttonsend" class="btn btn-default btn-block">Send Message</button>
                                </div>
                            </div>
                            <span class="loading"></span>
                            <div class="success-contact">
                                <div class="alert alert-success"><i class="fa fa-check-circle"></i> Your <strong>Email Send</strong> Thank you.</div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr class="separator">
                    </div>
                    <div class="col-md-4">
                        <div class="content-box small left no-margin-lg">
                            <div class="icon-shape-disable">
                                <i class="fa fa-building-o" aria-hidden="true"></i>
                            </div>
                            <h5 class="text-color">Office Address</h5>
                            <p>
                                Katihar <br>
                                Bihar
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="content-box small left no-margin-lg">
                            <div class="icon-shape-disable">
                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                            </div>
                            <h5 class="text-color">Office Hours</h5>
                            <p>
                                Monday to Friday : 7:00 - 18:00 <br>
                                Saturday : 9:00 - 15:00
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="content-box small left no-margin-lg">
                            <div class="icon-shape-disable">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <h5 class="text-color">Phone and Fax</h5>
                            <p>
                                Phone : 9191919191 <br>
                                
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>



  @endsection
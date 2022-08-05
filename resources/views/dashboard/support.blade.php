@extends('dashboard.layout.master')
@section('title')
    Agrina - Support
@endsection
@section('header-title')
    Support
@endsection
@section('content')
    <main role="main" class="ion-content">
        <div class="pt-4">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="margin: 0">
                        <div class="card-body support-page">
                            <h3 class="card-title"><i class="fa fa-building-o" aria-hidden="true"></i> Corporate Office</h3>
                            <p class="card-text">Saki-Vihar Road Sakinaka Andheri, Mumbai Maharastra 400072</p>
                            {{-- <a href="#" class="btn btn-primary">Call Us</a> --}}
                            <h3 class="card-title"><i class="fa fa-phone-square" aria-hidden="true"></i> Call us</h3>
                            <p class="card-text">8579905578</p>

                            <h3 class="card-title"><i class="fa fa-envelope-o" aria-hidden="true"></i> Email us</h3>
                            <p class="card-text" style="margin-bottom: 4px;">info@agrinacropcare.com</p>
                            <p class="card-text">customer@agrinacropcare.com</p>


                            <p class="support-link"><a href="#">Terms of use</a> | <a href="#">Privacy Policy</a>  <a href="#">Disclaimer</a> | <a href="#">Sitemap</a></p>
                            <p class="support-copyright">Copyright&#169;  {{date('Y')}}  AGRINA CROP CARE Pvt. Ltd</p>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@extends('master')

@section('title')Login - DBT Work @endsection

@section('description')DBT Work Description @endsection
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{url('')}}">Home</a></li>
          <li>Login</li>
        </ol>
        <h2>Login</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        

        <div class="row justify-content-center">

          <div class="col-lg-6">
            
           <div class="info-box p-3">
            <h3 class="text-center p-0 m-0">Login to your Account</h3>
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
            <form action="{{route('studentLogin')}}" method="post" class="form-horizontal">
                @csrf
                <div class="colum-row row">
                    <div class="col-sm-12 form-group my-3">
                        <input type="text" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" id="username" value="{{old('username')}}" name="username" class="form-control" placeholder="Username" required>
                            <span class="form-text text-danger">@error('username')
                                {{$message}}
                            @enderror</span>
                    </div>
                    <div class="col-sm-12 form-group my-3">
                        <input type="password" id="password" value="{{old('password')}}" name="password" class="form-control" placeholder="Password" required>
                            <span class="form-text text-danger">@error('password')
                                {{$message}}
                            @enderror</span>
                    </div>
                    <div class="col-sm-12 form-group text-center my-3">
                        <button id="submit" style="cursor: pointer;background: #e96b56;border:1px solid #e96b56;color:#fff;border-radius:5px;" class="buy-btn" type="submit">LOGIN</button>
                    </div>
                   
             </form>
             <div class="col-sm-12 text-center">
                <a href="{{url('register')}}">Don't have an Account? Register Now</a>
            </div>
           </div>

            
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  
@endsection
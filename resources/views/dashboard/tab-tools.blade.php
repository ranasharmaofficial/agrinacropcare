@php
$logged_id = Session::get('LoggedDash');
$logged_name = \App\Models\User::where('id',$logged_id)->first();
@endphp
<div class="osahan-menu-fotter fixed-bottom bg-white text-center border-top ">
    <div class="row m-0">
       <a href="{{url('dashboard/home')}}" class="text-muted small col font-weight-bold text-decoration-none p-2">
          <p class="h5 m-0"><i class="fa fa-home" aria-hidden="true"></i></p>
          Home
       </a>
       <a href="{{url('dashboard/crop-care')}}" class="text-muted col small font-weight-bold  text-decoration-none p-2">
          <p class="h5 m-0"><i class="fa fa-file-text-o" aria-hidden="true"></i></p>
          Crop Care
       </a>
       <a href="{{url('dashboard/insurance')}}" class="text-muted col small font-weight-bold text-decoration-none p-2">
          <p class="h5 m-0"><i class="fa fa-industry" aria-hidden="true"></i></p>
          Insurance
       </a>
       @if($logged_id!=null)
       <a href="{{url('dashboard/profile')}}" class="text-muted font-weight-bold small col text-decoration-none p-2">
          <p class="h5 m-0"><i class="fa fa-user-circle-o" aria-hidden="true"></i></p>
          Profile
       </a>
       @else
       <a href="{{url('dashboard/auth/login')}}" class="text-muted font-weight-bold small col text-decoration-none p-2">
         <p class="h5 m-0"><i class="fa fa-user-circle-o" aria-hidden="true"></i></p>
         Login
      </a>
       @endif
    </div>
</div>
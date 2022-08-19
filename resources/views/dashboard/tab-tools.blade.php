@php
$logged_id = Session::get('LoggedDash');
$logged_name = \App\Models\User::where('id',$logged_id)->first();
@endphp


<!-- footer-->
<div class="footer">
   <div class="row no-gutters justify-content-center">
       <div class="col-auto">
           <a href="index.html" class="active">
               <i class="material-icons">home</i>
               <p>Home</p>
           </a>
       </div>
       <div class="col-auto">
           <a href="analytics.html" class="">
               <i class="material-icons">insert_chart_outline</i>
               <p>Analytics</p>
           </a>
       </div>
       <div class="col-auto">
           <a href="wallet.html" class="">
               <i class="material-icons">account_balance_wallet</i>
               <p>Wallet</p>
           </a>
       </div>
       <div class="col-auto">
           <a href="shop.html" class="">
               <i class="material-icons">shopping_bag</i>
               <p>Shop</p>
           </a>
       </div>
       <div class="col-auto">
           <a href="profile.html" class="">
               <i class="material-icons">account_circle</i>
               <p>Profile</p>
           </a>
       </div>
   </div>
</div>


{{-- <div class="osahan-menu-fotter fixed-bottom bg-white text-center border-top ">
    <div class="row m-0">
       <a href="{{url('dashboard/home')}}" class="text-muted small col font-weight-bold text-decoration-none p-2">
          <p class="h5 m-0"><i class="fa fa-home" aria-hidden="true"></i></p>
          Home
       </a>
       <a href="{{url('dashboard/crop-doc')}}" class="text-muted col small font-weight-bold  text-decoration-none p-2">
          <p class="h5 m-0"><i class="fa fa-pagelines" aria-hidden="true"></i></p>
          Crop Doctor
       </a>
       <a href="{{url('dashboard/cattle-doc-search')}}" class="text-muted col small font-weight-bold text-decoration-none p-2">
          <p class="h5 m-0"><i class="fa fa-user-md" aria-hidden="true"></i></p>
          Cattle Doctor
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
</div> --}}
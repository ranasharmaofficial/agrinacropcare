@php
$logged_id = Session::get('LoggedDash');
$logged_name = \App\Models\User::where('id',$logged_id)->first();
@endphp
<div class="bg-dark auth-header">
    @yield('left-arrow')
    <div class="auth-header-title">
        Agrina
    </div>
</div>
@extends('dashboard.layout.master')
@section('title')
    Edit Profile
@endsection
@section('header-title')
    Edit Profile
@endsection

@section('content')
    <main role="main" class="ion-content ion-myprofile">
        <form action="{{ route('dashboard.updateProfile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-2 card bg-white profile-box text-center">
                <div class="card-header bg-success text-white font-weight-bold">
                    Update Personal Details
                </div>
                <div class="py-4 px-3 border-bottom">
                    @if($profiledetails->photo!=null)
                        <img alt="img" class="img-fluid mt-2 rounded-circle" src="{{asset('uploads/user').'/'.$profiledetails->photo}}">
                    @else
                         <img alt="img" class="img-fluid mt-2 rounded-circle" src="{{asset('assets_dash/icon/man.png')}}">
                    @endif
                    <h5 class="font-weight-bold text-dark mb-1 mt-4">{{ $LoggedUserInfo['name'] }}</h5>
                    <input type="file" value="{{ $profiledetails->photo }}" accept="image/*" class="form-control mt-2" name="file">
                </div>

                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Name:</th>
                            <td><input type="text" class="form-control" name="names" value="{{ $profiledetails->name }}" required></td>
                        </tr>
                        <tr>
                            <th>Mobile:</th>
                            <td><input type="tel" class="form-control" value="{{ $profiledetails->mobile }}" disabled></td>
                        </tr>
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">

                                <button type="submit" class="btn btn-block text-white" style="background: #003049">
                                    Update</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </form>
    </main>
@endsection

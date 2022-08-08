@extends('dashboard.layout.master')
@section('title')
    Edit Profile
@endsection
@section('header-title')
    Edit Profile
@endsection

@section('content')
    <main role="main" class="ion-content ion-myprofile">
        <form action="" method="GET" enctype="multipart/form-data">
            <div class="mb-2 card bg-white profile-box text-center">
                <div class="card-header bg-success text-white font-weight-bold">
                    Change Personal Details
                </div>
                <div class="py-4 px-3 border-bottom">
                    <img alt="img" class="img-fluid mt-2 rounded-circle"
                        src="https://i.pinimg.com/736x/d0/7a/f6/d07af684a67cd52d2f10acd6208db98f.jpg">
                    {{-- <h5 class="font-weight-bold text-dark mb-1 mt-4">{{ $LoggedUserInfo['name'] }}</h5> --}}
                    <input type="file" class="form-control mt-2" name="editImage">
                </div>
            
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Name:</th>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Mobile:</th>
                            <td><input type="text" class="form-control" value="9801785262" disabled></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><input type="text" class="form-control" value="example@gmail.com" disabled></td>
                        </tr>

                    </tbody>
                    <tfoot>
                        <tr >
                            <td colspan="2">

                                <button type="submit" class="btn btn-block text-white" style="background: #003049"> Update</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </form>
    </main>
@endsection

@extends('dashboard.layout.master')
@section('title')Change Password @endsection
@section('header-title')Change Password @endsection

@section('content')

    <main role="main" class="ion-content ion-myprofile">
        <div class="card pb-2">
            <div class="card-header bg-indigo text-white font-weight-bold">
                <i class="fa fa-lock"></i>&nbsp;Change Password
            </div>
            <div class="card-body">
                <form action="javascript:void(0);" method="post">
                    <div class="form-row">
                        <div class="col-sm-12 form-group">
                            <input type="password" name="currentpassword" title="Current Password" placeholder="Enter Current Password" required value="{{old('currentpassword')}}" class="form-control" />
                            <small class="form-text text-danger">@error('currentpassword') {{$message}} @enderror</small>
                        </div>
                        <div class="col-sm-12 form-group">
                            <input type="password" name="newpassword" title="New Password" placeholder="Enter New Password" required value="{{old('newpassword')}}" class="form-control" />
                            <small class="form-text text-danger">@error('newpassword') {{$message}} @enderror</small>
                        </div>
                        <div class="col-sm-12 form-group">
                            <input type="password" name="confirmpassword" title="Confirm Password" placeholder="Enter Confirm Password" required value="{{old('confirmpassword')}}" class="form-control" />
                            <small class="form-text text-danger">@error('confirmpassword') {{$message}} @enderror</small>
                        </div>
                        <div class="col-sm-12 form-group text-center">
                            <button class="btn btn-primary"><i class="fa fa-lock"></i> Change Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </main>
@endsection

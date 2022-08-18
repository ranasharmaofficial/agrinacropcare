@extends('dashboard.layout.master')
@section('title')
    Update Address
@endsection
@section('header-title')
    Update Address
@endsection

@section('content')
    <main role="main" class="ion-content ion-myprofile">
        <form action="{{ route('dashboard.updateAddressDetails') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-2 card bg-white profile-box text-center">
                <div class="card-header bg-success text-white font-weight-bold">
                    Update Address
                </div>
                

                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Address:</th>
                            <td><input type="text" class="form-control" name="address" value="{{ $user->address }}" required></td>
                        </tr>
                        @if($user->state!=null)
                            <tr>
                                <th>State:</th>
                                <td><input type="text" disabled class="form-control" name="address" value="{{ $state->name }}" required></td>
                            </tr>
                        @else
                            <tr>
                                <th>State:</th>
                                <td>
                                    <select class="form-control" required type="text" name="state" id="state">
                                        <option selected disabled>---Select State----</option>
                                        @foreach ($stateList as $citem)
                                            <option value="{{ $citem->id }}">{{ $citem->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        @endif
                        @if($user->district!=null)
                            <tr>
                                <th>District:</th>
                                <td><input type="text" name="state" disabled class="form-control" value="{{ $district->name }}" required></td>
                            </tr>
                        @else
                            <tr>
                                <th>District:</th>
                                <td>
                                    <select class="form-control" required type="text" name="district" id="school_id">
                                        <option selected disabled>---Select District----</option>
                                    </select>
                                </td>
                            </tr>
                        @endif
                        @if($user->block!=null)
                            <tr>
                                <th>Block:</th>
                                <td><input type="text" disabled class="form-control" value="{{ $block->name }}" required></td>
                            </tr>
                        @else
                            <tr>
                                <th>Block:</th>
                                <td>
                                    <select class="form-control" required type="text" name="block" id="class_id">
                                        <option selected disabled>---Select Block----</option>
                                    </select>
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <th>Pin Code:</th>
                            <td><input type="tel" class="form-control" value="{{ $user->pincode }}" name="pincode" placeholder="Pin Code" required></td>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        jQuery(document).ready(function() {

            jQuery('#school_id').change(function() {
                let school = jQuery(this).val();
                let datas = "";
                // console.log(school)
                // $('#sub_category').empty();
                // $('#sub_category').append(`<option value="0" disabled selected>Processing...</option>`);
                jQuery.ajax({
                    url: '{{ url('getBlockNames') }}',
                    type: 'post',
                    //dataType: "json",
                    data: 'school=' + school + '&_token={{ csrf_token() }}',
                    success: function(result) {
                        // console.log(result);
                        if (result == '') {
                            datas += '<option>Not Found.</option>';
                        } else {
                            // console.log(result);
                            datas += '<option selected disabled>---Select Block---</option>';
                            $.each(result, function(i) {
                                datas += '<option value="' + result[i].id + '">' +
                                    result[i].name + '</option>';
                                console.log(result);
                            });
                        }
                        jQuery('#class_id').html(datas);
                    }
                });
            });
			
			jQuery('#state').change(function() {
                let state = jQuery(this).val();
                let datas = "";
                // console.log(state)
                // $('#sub_category').empty();
                // $('#sub_category').append(`<option value="0" disabled selected>Processing...</option>`);
                jQuery.ajax({
                    url: '{{ url('getDistrictName') }}',
                    type: 'post',
                    //dataType: "json",
                    data: 'state=' + state + '&_token={{ csrf_token() }}',
                    success: function(result) {
                        // console.log(result);
                        if (result == '') {
                            datas += '<option>Not Found.</option>';
                        } else {
                            // console.log(result);
                            datas += '<option selected disabled>---Select District---</option>';
                            $.each(result, function(i) {
                                datas += '<option value="' + result[i].id_district + '">' +
                                    result[i].name + '</option>';
                                console.log(result);
                            });
                        }
                        jQuery('#school_id').html(datas);
                    }
                });
            });


        });
    </script>
@endsection

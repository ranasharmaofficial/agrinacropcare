@extends('admin.layouts.master')
@section('title','Employee List')
@section('content')
<style>
    img, svg {
    vertical-align: middle;
    height: 10px;
}
</style>
 <div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">@yield('title')</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-danger rounded">
                        <h3 class="card-title text-white">@yield('title')</h3>
                        <p class="p-0 m-0 text-white">Total Employee: <b>{{$employee->total();}}</b>, Page No: <b>{{$employee->currentPage();}}</b></p>
						
                    </div>
                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if (Session::has('alert-' . $msg))
                                <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                                    {{ Session::get('alert-' . $msg) }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="card-body">

                        <form method="get" style="float: right;">
                            <div class="app-search">
                                <input name="search" value="{{$sort_search}}" type="text" class="form-control" placeholder="Search here...">
                                <span id="search_icons" class="ri-search-line"></span>
                            </div>
                        </form>
                        <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr class="bg-dark text-white">
                                <th>Sl.No</th>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>qualification</th>
                                <th>Dob</th>
                                <th>Action</th>
                              </tr>
                            </thead>


                            <tbody>
                                @foreach ($employee as $key => $item)
                                <tr>
                                    <td>{{($employee->currentpage()-1) * $employee->perpage() + $key + 1}}</td>
                                    <td>{{$item->user_id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->mobile}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->password}}</td>
                                    <td>{{$item->qualification}}</td>
                                    <td>{{$item->dob}}</td>
                                    <td>
                                        <a title="View Details" href="{{url('admin/employee-view/'.$item->user_id)}}"><i class="ri-eye-line"></i></a>
                                        <form method="POST" action="{{ route('employees.delete', $item->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <i style="cursor:pointer;" class="ri-delete-bin-fill show_confirm text-danger"></i>
                                        </form>
                                    </td>
                                 </tr>
                                @endforeach
                                <tr>
                                    <td colspan="7">
                                        <nav aria-label="...">
                                            <ul class="pagination justify-content-end mb-0">
                                                {{$employee->links();}}
                                            </ul>
                                        </nav>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
     </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>
@endsection

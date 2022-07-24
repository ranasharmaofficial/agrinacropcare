$(document).ready(function() {
    toastr.options.timeOut = 2000;
    @if (Session::has('alert-danger'))
        toastr.error('{{ Session::get('alert-danger') }}');
    @elseif(Session::has('alert-success'))
        toastr.success('{{ Session::get('alert-success') }}');
    @elseif(Session::has('alert-warning'))
        toastr.success('{{ Session::get('alert-warning') }}');
    @endif
});
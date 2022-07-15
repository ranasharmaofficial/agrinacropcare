@extends('dashboard.layout.master')
@section('title')Blogs @endsection
@section('header-title')Blogs @endsection

@section('content')
<style>
p {
    padding: 0;
    margin: 0;
    font-weight: 500;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    font-size: 1rem;
}

.payment-card {
    border-top: 0.15rem solid rgb(0, 131, 136) !important;
}
</style>
<main role="main" class="ion-content ion-myprofile">
    <div class="card pb-2">
        <div class="card-header bg-indigo text-white font-weight-bold">
            Blogs
        </div>
        
        <div class="row">
           <div class="col-12">
                <div class="card">
                    <img src="{{asset('uploads/blogs/'.$blog_detailss->blogImage)}}" alt="{{$blog_detailss->blogName}}">
                    <div class="card-body">
                        <span class="date"><i class="fa fa-clock-o"></i> {{date('d-M-Y', strtotime($blog_detailss->created_at))}}</span>
                        <h5 class="card-title">{{$blog_detailss->blogTitle}}</h5>
                        <p class="card-text">{!! html_entity_decode($blog_detailss->blogDetails) !!}</p>
                        {{-- <a href="{{url('dashboard/blog-details').'/'.$item->slug}}" class="btn btn-info btn-sm float-right">Read&nbsp;More..</a> --}}
                    </div>
                </div>
            </div>
       
        </div>
        
        
    </div>

</main>
@endsection
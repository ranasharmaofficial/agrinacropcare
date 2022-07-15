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
            
        @foreach ($blogs as $item)
        @php
           $details = strlen($item->blogDetails) > 250 ? substr($item->blogDetails, 0, 250) . " ..." : $item->blogDetails; 
        @endphp
        
                <div class="col-12">
                    <div class="card">
                        <img src="{{asset('uploads/blogs/'.$item->blogImage)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <span class="date"><i class="fa fa-clock-o"></i> {{date('d-M-Y', strtotime($item->created_at))}}</span>
                          <h5 class="card-title">{{$item->blogTitle}}</h5>
                          <p class="card-text">{!! html_entity_decode($details) !!}</p>
                          <a href="{{url('dashboard/blog-details').'/'.$item->slug}}" class="btn btn-info btn-sm float-right">Read&nbsp;More..</a>
                        </div>
                    </div>
                    {{-- <div class="card-body p-0">
                        <div class="card mb-0">
                            <div class="card-body p-2">
                                <h5>{{$item->blogTitle}}</h5>
                                <hr>
                                <p>{!! html_entity_decode($item->noticeDetails) !!}</p>
                            </div>
                        </div>
                    </div><!---CardEnd---> --}}
                </div>
        @endforeach
          
        </div>
        
        
    </div>

</main>
@endsection
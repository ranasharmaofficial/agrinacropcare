@extends('dashboard.layout.master')
@section('title')Agriculture Shop @endsection
@section('header-title')Agriculture Shop @endsection

@section('content')
    <main role="main" class="ion-content ion-myprofile">
         
        <div class="card mb-6">
       <div class="card-header font-weight-bold text-center text-success">
          Look for Agriculture Shop
       </div>
       @if(count($agrishops)>0)
        <div class="card-body p-2">
            <p style="color:rgb(141, 10, 119);font-weight:bold;">Showing results from Bihar, {{$districtName->name}}-{{$pin}}</p>
            @foreach ($agrishops as $item) 
               
				
				<div class="row mb-3">
                            <div class="col-md-12 cattle_show_result">
                                 
                                <p class=" text-primary"><span>Firm Name
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span>
                                    {{ $item->firm_name }}</p>
									<p class=" text-primary"><span>Proprietor
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span>
                                    {{ $item->name }}</p>
                                <p class=" text-primary"><span>Address
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span> Purnea</p>
                                
                            </div>
                            <div class="col">
                                <a href="tel:{{ $item->mobile }}" class="btn text-white doct_call_now"><i
                                        class="fa fa-phone" aria-hidden="true"></i> Call</a>
                            </div>
                        </div>
                        <hr>
            @endforeach
        </div>
        @else 
        <div class="card-body p-1">
            <div class="row mb-3">                
                <div class="col">
                    <span class="text-center text-danger">No&nbsp;related&nbsp;Data&nbsp;Found</span>
                </div> 
                <div class="col">
                    <a href="{{url('dashboard/agriculture-shop')}}" class="btn btn-danger float-right">Go&nbsp;Back</a>
                </div>
            </div>
        </div>  
        @endif    
    </div>
	</div>
    </main>
	 
@endsection

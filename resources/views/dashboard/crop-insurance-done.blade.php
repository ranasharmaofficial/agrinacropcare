@extends('dashboard.layout.master')
@section('title')Crop Insurance @endsection
@section('header-title')Crop Insurance @endsection

@section('content')
    <main role="main" class="ion-content ion-myprofile">
        
        
        <div style="background-color: #28a745!important;" class="vh-100">
         <div class="p-3 text-center">
            <i class="icofont-check-circled display-1 text-warning"></i>
            <h4 style="color:#fff;" class="font-weight-bold">You have Successfully Applied for Crop Insurance!</h4>
            <h2 style="color:#fff;" class="font-weight-bold">धन्यवाद !</h2>
			<h3 style="color:yellow;" class="font-weight-bold">{{$getdetails->name}}</h3>
			<h5 style="line-height:1.6;color:#fff;" class="font-weight-bold">कृपया प्रतीक्षा करें , हमारे प्रतिनिधि जल्द ही आप से संपर्क करेंगे |</h5>
          </div>
		  
		<div class="bg-white rounded p-1 m-2 text-center">
			<p><strong>Insurance Number :</strong> {{$getdetails->insurance_no}}</p>
			<p><strong>Date :</strong> {{$getdetails->insurance_start_date}}</p>
			
		</div>
		</br>
		</br>
	 
	  </br>
	  </br>
	  </br>
      </div>
    </main>
@endsection

@extends('dashboard.layout.master')
@section('title')Payment History @endsection
@section('header-title')Payment History @endsection

@section('content')
<style>
    p{
        padding: 0;
        margin: 0;
        font-weight: 500;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        font-size: 1rem;
    }
    .payment-card{
        border-top: 0.15rem solid rgb(0, 131, 136) !important;
    }
</style>
    <main role="main" class="ion-content ion-myprofile">
        <div class="card pb-2">
            <div class="card-header bg-indigo text-white font-weight-bold">
                &#8377;&nbsp;&nbsp;&nbsp;&nbsp;Payment History
            </div>
            <div class="card-body p-0">
                @foreach ($paymenthistory as $item)
                <div class="card mb-0 payment-card">
                    <div class="card-body p-1">
                        <p>Receipt No: {{$item->id}}</p>
                        <p>Paid on: {{$item->paid_amount}}</p>
                        <p>Mode: {{$item->paymentmode}} Payment</p>
                        <p>Transaction Number: {{$item->tnxNumber}}</p>
                        <p>Paid Amount: &#8377;&nbsp;{{$item->paid_amount}}/-</p>
                         @if ($item->status=='1')
                        <p class="text-success">Status:  Success</p> 
                        @else
                        <p class="text-danger">Status:  Failed</p>   
                        @endif
                    </p>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
        
    </main>
@endsection

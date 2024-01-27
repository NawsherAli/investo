@extends('customer.layouts.layout')
@section('title')
	Investo - Deposit
@endsection
@section('contents')
<link rel="stylesheet" href="{{asset('assets/css/withdraw.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/deposit.css')}}">
 <div class="container">
    <header>
        <h1>Account Balance {{Auth::user()->current_balance}}PKR</h1>
    </header>
    @if(session('error'))
        <div class="message-container bg-red-200 border-red-500 border-t-4 p-4 mb-4 rounded-lg">
             <p style="background-color: rgba(255,0,0,0.3); padding: 10px; border-radius: 7px; color: red">{{ session('error') }}</p>
        </div>
    @endif
    @if(session('success'))
        <div id="successMessage" class="alert alert-success">
            
            <p style="background-color: lightgreen; padding: 10px; border-radius: 7px; color: green">{{ session('success') }}</p>
        </div>
    @endif
    <section class="withdraw-section" id="withdrawSection">
        <h2>Invest Now</h2>
     
                
         <form method="POST" action="{{route('invest.store')}}"  enctype="multipart/form-data" id="deposit-form">
        @csrf   <label>Investment Amount</label>
                <input type="number" name="amount" min="{{$plan->manimum}}" max="{{$plan->maximum}}">
                <input type="number" name="plan_id" hidden value="{{$plan->id}}">
                <button type="submit" id="uploadImageButton"  style="margin-top: 20px">Save</button>
                 <!-- <button type="submit" id="uploadImageButton" disabled>Save</button> -->
            </div>
        </form>
    </section>

    
</div>

@endsection
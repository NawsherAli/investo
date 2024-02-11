@extends('customer.layouts.layout')
@section('title')
	Invest
@endsection
@section('contents')
<link rel="stylesheet" href="{{asset('assets/css/withdraw.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/deposit.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/footer.css')}}">
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
<div class="footer1" style="z-index: 10">
<div class="items1">
    <ul>
        <li  class="active">
            <a href="{{route('user.plan.index')}}">
                <i class="fas fa-calendar-alt"></i>
                <span>Plans</span>
            </a>
        </li>
        <li>
            <a href="{{route('user.tasks.index')}}">
                <i class="fas fa-tasks"></i>
                <span>Tasks</span>
            </a>
        </li>
        <li>
            <a href="{{route('investors.dashboard')}}">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="{{route('user.create.deposit')}}">
                <i class="fas fa-hand-holding-usd deposit-icon"></i>
                <span>Deposit</span>
            </a>
        </li>
        <li>
            <a href="{{route('user.luckydraw.create')}}">
                <i class="fas fa-gift"></i>
                <span>Lucky <span>Draw</span></span>
            </a>
        </li>
        <li>
            <a href="{{route('user.withdraw.create')}}">
                <i class="fas fa-money-bill-wave withdraw-icon"></i>
                <span>withdraw</span>
            </a>
        </li>
    </ul>
</div>
</div>
@endsection
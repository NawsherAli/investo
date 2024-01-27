@extends('customer.layouts.layout')
@section('title')
	Investo -withdraw
@endsection
@section('contents')
<!-- <link rel="stylesheet" href="{{asset('assets/css/withdraw.css')}}"> -->
<link rel="stylesheet" href="{{asset('assets/css/team.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/home_style.css')}}">
    <div class="team_details">
       <div class="bg_colour">
        <div class="first_heading">
            <h1>My Team</h1>
        </div>
        <div class="total_members">
            <h2>Total Members : {{count($teammembers)}}</h2>
        </div>
       </div>
        <div class="referals">
       
        @foreach($teammembers as $teammember)
            <div class="name">
                <h3>Name</h3>
                <p>{{ $teammember->name }}</p>
            </div>
            <div class="email">
                <h3>Email</h3>
                <p>{{ $teammember->email }}</p>
            </div>
            <div class="investment">
                <h3>Investment</h3>
                @php
                    $investAmount = 0; // Initialize the variable here
                    foreach ($teammember->invests as $invest) {
                        $investAmount += $invest->amount;
                    }
                @endphp
                <p>{{ $investAmount }} PKR</p>
            </div>
        @endforeach

            
        </div>
    </div>

@endsection
@extends('customer.layouts.layout')
@section('title')
	Team
@endsection
@section('contents')
<!-- <link rel="stylesheet" href="{{asset('assets/css/withdraw.css')}}"> -->
<link rel="stylesheet" href="{{asset('assets/css/team.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/home_style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/footer.css')}}">
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
<div class="footer1" style="z-index: 10">
        <div class="items1">
            <ul>
                <li class="task_icon">
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
                <li >
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
                <li class="active">
                    <a href="{{route('user.withdraw.create')}}">
                        <i class="fas fa-money-bill-wave withdraw-icon"></i>
                        <span>withdraw</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection
@php
    $referralCode = Auth::user()->referal_code;
    $registrationLink = URL::route('register') . '?referral_code=' . $referralCode;

@endphp
@extends('customer.layouts.layout')
@section('title')
	Dashboard
@endsection
@section('contents')
	<link rel="stylesheet" href="{{asset('assets/css/home_style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/footer.css')}}">
    <div class="second_container" >
        <div class="account_balance">
            <p id="balance">Account balance</p>
            <p id="balance_amount">{{Auth::user()->current_balance}} PKR</p>
        </div>
    </div>
    <!-- ******************************other items*********************************** -->
    <div class="otheritems">
        <div class="item total_withdraw">
            <i class="fas fa-money-bill-wave withdraw-icon"></i>
        <span class="padding">Total Withdraw </span>
        <p id="user_withdraw" class="padding">{{$allwithdraws}}  PKR</p>
        </div>

        <div class="item total_deposit">
            <i class="fas fa-hand-holding-usd deposit-icon"></i>

            <span class="padding">Total deposit </span>
            <p id="user_withdraw" class="padding">{{$alldeposits}} PKR</p>
        </div>
        <div class="item total_invest">
            <i class="fas fa-chart-line invest-icon"></i>
            <span class="padding">Total invest </span>
            <p id="user_withdraw" class="padding">{{$allinvests}} PKR</p>
        </div>
        <div class="item current_invest">
            <i class="fas fa-handshake" style="color: white"></i>
            <span class="padding">Current invest</span>
            <p id="user_withdraw" class="padding">{{$allcurrentinvests}} PKR</p>
        </div>
    </div>
    <div class="otheritems2">
        <div class="item current_plan bg-colour">
            <i class="fas fa-calendar-alt" style="color: white"></i>
            <span class="padding">Current Plans</span>
             
            <p id="user_withdraw" class="padding">@foreach($user_invests as $user_invest)  {{$user_invest->plan->name}}, @endforeach</p>
            
        </div>
        <div class="item pending_invest bg-colour">
            <i class="fas fa-hourglass-half pending-invest-icon" style="color: white"></i>
            <span class="padding">Earn from Invest</span>
            <p id="user_withdraw" class="padding">{{$allearnfrominvest}}  PKR</p>
        </div>
        <div class="item pending_withdraw bg-colour">
            <i class="fas fa-hourglass-half pending-withdraw-icon" style="color: white"></i>
            <span class="padding">Pending withdraw</span>
            <p id="user_withdraw" class="padding">{{$allpendingwithdraws}} PKR</p>
        </div>
        <div class="item referal_earn bg-colour">
        
            <i class="fas fa-users referral-earn-icon" style="color: white"></i>
       
            <span class="padding">Referal earn</span>
            <p id="user_withdraw" class="padding">{{Auth::user()->referal_invest_earn}} PKR</p>
        </div>
    </div>

    <div class="whatsapp-telegram-container">
        <i class="fab fa-whatsapp whatsapp-telegram-icon" onclick="openWhatsApp()"></i>
        <i class="fab fa-telegram whatsapp-telegram-icon" onclick="openTelegram()"></i>
    </div>

    <div class="link">
        <a href="{{$registrationLink }}" target="blank">{{$registrationLink }}</a>
        <button class="copy-button" onclick="copyLink()">Copy</button>
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
                <li class="active">
                    <a href="{{route('investors.dashboard')}}">
                        <i class="fas fa-home"></i>
                        <span >Home</span>
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
@endsection('contents')

@extends('customer.layouts.layout')
@section('title')
	Investo -withdraw
@endsection
@section('contents')
<link rel="stylesheet" href="{{asset('assets/css/withdraw.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/footer.css')}}">
<div class="container">
    <header>
        <h1>Profile Change</h1>
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
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <section class="withdraw-section" id="withdrawSection">
                <!-- Withdraw Form -->
        <form method="post" action="{{ route('customer.profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="form-row">
            <div class="form-group col-md-6  ">
                <label for="driver-phone" class="text-primary">User Name</label>
                <input type="text" class="form-control" id="driver-phone" name="name" value="{{$user->name}}">
            </div>
            <div class="form-group col-md-6  ">
                <label for="email" class="text-primary">User Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{$user->email}}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6  ">
                <label for="contact" class="text-primary">Phone Number</label>
                <input type="text" class="form-control" id="contact"  name="contact" value="{{$user->contact}}">
            </div>
        </div>
            <div class="form-row">
                <div class="form-group col-md-6  ">
                                            </div>
                <div class="form-group col-md-3 col-6  d-flex align-items-end justify-content-end">
                    <button type="reset" class="btn  border-primary1 showbtn" id="cancelButton" style="width: 200px; display: none">Cancel</button>
                </div>
                <div class="form-group col-md-3 col-6  d-flex align-items-end justify-content-end">
                    <button type="save" class="btn  btn-primary showbtn">Save</button>
                </div>
            </div>
        
        </form>
    <div class="row">
    <div class="col-md-12 d-flex justify-content-between">
        <h3 class="title-with-line title-responsive">Change Password&nbsp;</h3>
    </div>
</div>
<form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
@csrf
@method('put')

    <div class="form-row">
        <div class="form-group col-md-4 ">
            <label for="current_password" class="text-primary">Current Password</label>
            <input type="password" class="form-control" id="current_password" placeholder="Enter Current Password" name="current_password">
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>
        <div class="form-group col-md-4  ">
            <label for="password" class="text-primary">New Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter New Password" name="password">
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>
        <div class="form-group col-md-4  ">
            <label for="password_confirmation" class="text-primary">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation">
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

    </div>
    <div class="form-row">
        <div class="form-group col-md-9  "></div>
        <div class="form-group col-md-3 col-6  d-flex align-items-end justify-content-end">
            <button type="submit" class="btn  btn-primary showbtn"  style="width: 200px;">Change Password</button>
        </div>
    </div>
</form>        

    </section>

    
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
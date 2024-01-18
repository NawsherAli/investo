@php
    $role = Auth::user()->role;
@endphp
<div class="row mb-3 bg-primary pt-2 br-5 " style="border-bottom: 2px solid #219653">
    <div class="col-md-6 order-sm-1 order-1 col-8">
        <h1 class="text-white">Fundraisers</h1>
    </div>
    <div class="col-md-4 order-sm-2 order-3 ">
        <div class="input-affix m-b-10">
            <input type="text" class="form-control" placeholder="Search">
            <i class="suffix-icon anticon anticon-search"></i>
        </div>
    </div>
    <div class="col-md-2 order-sm-3 order-2 col-4 ">
        <div class="dropdown dropdown-animated scale-left">
            <button type="button" class="btn btn-default" data-toggle="dropdown">
                <i class="fas fa-sliders-h"></i>
            <!-- <img src="assets/icons/filter-icon.png"> -->
            <span>Filter</span>
            </button>
            <div class="dropdown-menu">
                <button class="dropdown-item" type="button">Sort By Lates Funds</button>
                <button class="dropdown-item" type="button">Sort By Higest Funds</button>
            </div>
        </div>
    </div>
</div>
<div class="row " id="card-view">
    <div class="col-md-4 col-6">
        <div class="card bg-primary-light">
            <div class="card-body">
                <div class="m-t-20 text-center">
                    <div class="avatar avatar-image bg-primary-light" style="height: 100px; width: 100px;">
                        <img src="{{asset('assets/icons/personal-trainer.png')}}" alt="">
                    </div>
                    <h4 class="m-t-30">Personal Fundraising</h4>
                    <p>Charity Goal: $1000 <br>
                       Charity Type: school</p>
                </div>
                <div class="text-center m-t-30">
                    <a href='{{route("$role.view.fundraiser")}}' class="btn btn-primary">
                        <span class="m-l-5">View Charity</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-6">
        <div class="card bg-primary-light">
            <div class="card-body">
                <div class="m-t-20 text-center">
                    <div class="avatar avatar-image bg-primary-light" style="height: 100px; width: 100px;">
                        <img src="{{asset('assets/icons/personal-trainer.png')}}" alt="">
                    </div>
                    <h4 class="m-t-30">Personal Fundraising</h4>
                    <p>Charity Goal: $1000 <br>
                       Charity Type: school</p>
                </div>
                <div class="text-center m-t-30">
                    <a href="profile.html" class="btn btn-primary">
                        <span class="m-l-5">View Charity</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-6">
        <div class="card bg-primary-light">
            <div class="card-body">
                <div class="m-t-20 text-center">
                    <div class="avatar avatar-image bg-primary-light" style="height: 100px; width: 100px;">
                        <img src="{{asset('assets/icons/personal-trainer.png')}}" alt="">
                    </div>
                    <h4 class="m-t-30">Personal Fundraising</h4>
                    <p>Charity Goal: $1000 <br>
                       Charity Type: school</p>
                </div>
                <div class="text-center m-t-30">
                    <a href="profile.html" class="btn btn-primary">
                        <span class="m-l-5">View Charity</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-6">
        <div class="card bg-primary-light">
            <div class="card-body">
                <div class="m-t-20 text-center">
                    <div class="avatar avatar-image bg-primary-light" style="height: 100px; width: 100px;">
                        <img src="{{asset('assets/icons/personal-trainer.png')}}" alt="">
                    </div>
                    <h4 class="m-t-30">Personal Fundraising</h4>
                    <p>Charity Goal: $1000 <br>
                       Charity Type: school</p>
                </div>
                <div class="text-center m-t-30">
                    <a href="profile.html" class="btn btn-primary">
                        <span class="m-l-5">View Charity</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-6">
        <div class="card bg-primary-light">
            <div class="card-body">
                <div class="m-t-20 text-center">
                    <div class="avatar avatar-image bg-primary-light" style="height: 100px; width: 100px;">
                        <img src="{{asset('assets/icons/personal-trainer.png')}}" alt="">
                    </div>
                    <h4 class="m-t-30">Personal Fundraising</h4>
                    <p>Charity Goal: $1000 <br>
                       Charity Type: school</p>
                </div>
                <div class="text-center m-t-30">
                    <a href="profile.html" class="btn btn-primary">
                        <span class="m-l-5">View Charity</span>
                    </a>
                </div>
            </div>
        </div>
    </div> 
    <div class="col-md-4 col-6">
        <div class="card bg-primary-light">
            <div class="card-body">
                <div class="m-t-20 text-center">
                    <div class="avatar avatar-image bg-primary-light" style="height: 100px; width: 100px;">
                        <img src="{{asset('assets/icons/personal-trainer.png')}}" alt="">
                    </div>
                    <h4 class="m-t-30">Personal Fundraising</h4>
                    <p>Charity Goal: $1000 <br>
                       Charity Type: school</p>
                </div>
                <div class="text-center m-t-30">
                    <a href="profile.html" class="btn btn-primary">
                        <span class="m-l-5">View Charity</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
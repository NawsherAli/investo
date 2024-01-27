Side Nav START -->
<div class="side-nav" > 
<!-- #ff004f -->
     <div class="logo logo-dark">
        <a href="{{route('admin.dashboard')}}" class="d-flex justify-content-center">
            <img src="{{asset('assets/images/logo/logo.png')}}" alt="Logo" width="70%" height="75%">
            <!-- <img class="logo-fold" src="assets/images/logo/logo-fold.png" alt="Logo"> -->
        </a>
    </div>
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="nav-item">
                <a class="dropdown-toggle  " href="{{route('admin.dashboard')}}">
                    <span class="icon-holder">
                        <i class="anticon anticon-appstore"></i>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
           <!--  <li class="nav-item ">
                <a class="dropdown-toggle" href="{{route('admin.deposits.index')}}">
                    <span class="icon-holder">
                        <i class="fas fa-hand-holding-usd"></i>
                    </span>
                    <span class="title">Deposits</span></a>
            </li> -->
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fas fa-hand-holding-usd"></i>
                    </span>
                    <span class="title">Deposits</span>
                    <span class="arrow">
                        <!-- <i class="arrow-icon"></i> -->
                        <i class="anticon anticon-down"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="">
                        <a href="{{route('admin.deposits.index')}}">Invest Deposit</a>
                    </li>
                    <li>
                        <a href="{{route('admin.deposits.helpindex')}}">Help Deposit</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
						<i class="fab fa-keycdn"></i>
					</span>
                    <span class="title">Plans</span>
                    <span class="arrow">
						<!-- <i class="arrow-icon"></i> -->
                        <i class="anticon anticon-down"></i>
					</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="">
                        <a href="{{route('admin.plans.investments')}}">Plans Investments</a>
                    </li>
                    <li class="">
                        <a href="{{route('admin.plans.index')}}">All Plans</a>
                    </li>
                    <li>
                        <a href="{{route('admin.plans.create_plan')}}">Create Plan</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-hdd"></i>
                    </span>
                    <span class="title">Tasks</span>
                    <span class="arrow">
                        <i class="anticon anticon-down"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{route('admin.tasks.userTaskIndex')}}">User Tasks</a>
                    </li>
                    <li>
                        <a href="{{route('admin.tasks.index')}}">All Tasks</a>
                    </li>
                    <li>
                        <a href="{{route('admin.tasks.create')}}">Create Tasks</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fas fa-taxi"></i>
                    </span>
                    <span class="title">Withdraw</span>
                    <span class="arrow">
                        <i class="anticon anticon-down"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{route('admin.withdraw.index')}}">Withdraw Requests</a>
                    </li>
                    <li>
                        <a href="{{route('admin.withdraw.info.index')}}">Set Withdraw info</a>
                    </li>
                </ul>
            </li>
            <!-- <li class="nav-item  ">
                <a class="dropdown-toggle" href="{{route('admin.withdraw.index')}}">
                    <span class="icon-holder">
                        <i class="fas fa-taxi"></i>
                    </span>
                    <span class="title">Withdraw Requests</span>
                </a>
            </li> -->
            <li class="nav-item  ">
                <a class="dropdown-toggle" href="{{route('admin.luckydraw.index')}}">
                    <span class="icon-holder">
                        <i class="fas fa-taxi"></i>
                    </span>
                    <span class="title">Lucky Draw</span>
                </a>
            </li>
            <!-- <li class="nav-item  ">
                <a class="dropdown-toggle" href="{{route('admin.withdraw.info.index')}}">
                    <span class="icon-holder">
                        <i class="fas fa-dollar"></i>
                    </span>
                    <span class="title">Set Withdraw info</span>
                </a>
            </li> -->
            <li class="nav-item  ">
                <a class="dropdown-toggle" href="{{route('admin.users')}}">
                    <span class="icon-holder">
                        <i class="far fa-user"></i>
                    </span>
                    <span class="title">Users</span></a>
            </li>
            <li class="nav-item  ">
                <a class="dropdown-toggle" href="{{route('admin.profile.edit')}}">
                    <span class="icon-holder">
                        <i class="anticon anticon-setting"></i>
                    </span>
                    <span class="title">Settings</span></a> 
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- Side Nav END
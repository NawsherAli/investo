<!-- Side Nav START -->
<div class="side-nav">
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
            <li class="nav-item ">
                <a class="dropdown-toggle" href="{{url('admin/donations')}}">
                    <span class="icon-holder">
                        <i class="fas fa-hand-holding-usd"></i>
                    </span>
                    <span class="title">Donations</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
						<i class="fab fa-keycdn"></i>
					</span>
                    <span class="title">Fund Raising</span>
                    <span class="arrow">
						<!-- <i class="arrow-icon"></i> -->
                        <i class="anticon anticon-down"></i>
					</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="">
                        <a href="{{route('admin.fundraiser.donations')}}">Fundraising Donation</a>
                    </li>
                    <li>
                        <a href="{{route('admin.charities')}}">Charities</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-hdd"></i>
                    </span>
                    <span class="title">Profile</span>
                    <span class="arrow">
                        <i class="anticon anticon-down"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{route('drivers.index')}}">Driver Profiles</a>
                    </li>
                    <li>
                        <a href="{{route('drivers.create')}}">Create Driver Profile</a>
                    </li>
                    <li>
                        <a href="{{route('customer.index')}}">Customers</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a class="dropdown-toggle" href="{{route('admin.pickup')}}">
                    <span class="icon-holder">
                        <i class="fas fa-taxi"></i>
                    </span>
                    <span class="title">Pickup request</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a class="dropdown-toggle" href="{{route('admin.chat')}}">
                    <span class="icon-holder">
                        <i class="far fa-comment-alt"></i>
                    </span>
                    <span class="title">Chats</span></a>
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
<!-- Side Nav END -->
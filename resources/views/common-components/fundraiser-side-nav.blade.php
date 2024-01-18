<!-- Side Nav START -->
<div class="side-nav">
     <div class="logo logo-dark">
        <a href="index.html" class="d-flex justify-content-center">
            <img src="../assets/images/logo/logo.png" alt="Logo" width="70%" height="75%">
            <!-- <img class="logo-fold" src="assets/images/logo/logo-fold.png" alt="Logo"> -->
        </a>
    </div>
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="nav-item">
                <a class="dropdown-toggle" href="{{route('fundraiser.dashboard')}}">
                    <span class="icon-holder">
                        <i class="anticon anticon-appstore"></i>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="dropdown-toggle" href="{{url('fundraiser/donations')}}">
                    <span class="icon-holder">
                        <i class="fas fa-hand-holding-usd"></i>
                    </span>
                    <span class="title">Donations</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a class="dropdown-toggle" href="{{route('fundraiser.chat')}}">
                    <span class="icon-holder">
                        <i class="far fa-comment-alt"></i>
                    </span>
                    <span class="title">Chats</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a class="dropdown-toggle" href="{{route('fundraiser.profile.edit')}}">
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/css/home_style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/plans.css')}}">
</head>
<body>
<header>
        <div id="logo"></div>
        <div id="item2">
            <div class="user-info">{{ (strlen(Auth::user()->name) > 5) ? substr(Auth::user()->name, 0, 5) . '..' : Auth::user()->name }}</div>
            <div class="user-image"></div>
            
        </div>
</header>
    <!-- **************************************************************************** -->
    <div id="openSidebarBtn" onclick="openSidebar()">
        <i class="fas fa-bars"></i>
    </div>

    <!-- Sidebar Content -->
    <div class="sidebar" id="sidebar">
        <button id="closeSidebarBtn" onclick="closeSidebar()">×</button>
        <ul>
            <li><a href="https://chat.whatsapp.com/ELQyetBG51JAWD9c7hfssH" target="_blank">Join WhatsApp</a></li>
            <li><a href="{{route('user.team')}}">My Team</a></li>
            <li><a href="{{ route('customer.profile.edit') }}">Change Profile</a></li>
        </ul>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
            <a href="{{route('logout')}}" id="signOutBtn" class="dropdown-item d-block p-h-15 p-v-10"  onclick="event.preventDefault();this.closest('form').submit();">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                        <span class="m-l-10">Logout</span>
                    </div>
                    <i class="anticon font-size-10 anticon-right"></i>
                </div>
            </a>
        </form>
        <!-- <button id="signOutBtn" onclick="signOut()">Sign Out</button> -->
    </div>
<header class="header body-pd" id="header">
        <div class="header_toggle"> 
            <i class='bx bx-menu' id="header-toggle"></i> 
        </div>
        <div class="header_img"> 
            <img src="{{asset('assets/images/shigure-ui-ui.gif')}}" alt="">
        </div>
       
</header>
<div class="l-navbar show" id="nav-bar">


    <nav class="nav">
      
        <div> 
   
            <a href="#" class="nav_logo"> <i class='bx bx-home nav_icon'></i><span class="nav_name">Sample Web</span> </a>
            <div class="nav_list"> 
                <a href="{{ route('dashboard') }}" class="nav_link {{ Request::is('dashboard') ? 'active' : '' }}"> 
                    <i class="bx bx-grid-alt nav_icon"></i> 
                    <span class="nav_name">Dashboard</span> 
                </a> 
                <a href="{{ route('users') }}" class="nav_link {{ Request::is('users') ? 'active' : '' }}"> 
                    <i class='bx bx-user nav_icon'></i> 
                    <span class="nav_name">Users</span> 
                </a> 
            </div>
        </div> 
     
        <a href="{{route('logout')}}" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Logout</span> </a>
    </nav>
</div>
<header class="header body-pd" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="" alt=""> </div>
</header>
<div class="l-navbar show" id="nav-bar">
    <nav class="nav">
        <div> 
            <a href="#" class="nav_logo"> <i class="bx bx-home nav_logo-icon "></i> <span class="nav_logo-name">App Sample</span> </a>
            <div class="nav_list"> 
                <a href="{{ route('dashboard') }}" class="nav_link {{ Request::is('/') ? 'active' : '' }}"> <i class="bx bx-grid-alt nav_icon"></i> <span class="nav_name">Dashboard</span> </a> 
                <a href="{{ route('users') }}" class="nav_link {{ Request::is('users') ? 'active' : '' }}"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a> 
            </div>
        </div> 
        <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
    </nav>
</div>
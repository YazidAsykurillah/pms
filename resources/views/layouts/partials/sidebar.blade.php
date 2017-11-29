<!-- left side start-->
<div class="left-side sticky-left-side">

    <!--logo and iconic logo start-->
    <div class="logo">
        <h1><a href="{{ url('dashboard') }}">PMS <span><i class="lnr lnr-magic-wand"></i></span></a></h1>
    </div>
    <div class="logo-icon text-center">
        <a href="{{ url('dashboard') }}"><i class="lnr lnr-home"></i> </a>
    </div>

    <!--logo and iconic logo end-->
    <div class="left-side-inner">
        
        <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li class="active"><a href="{{ url('dashboard') }}"><i class="lnr lnr-power-switch"></i><span>Dashboard</span></a></li>
                
                <li><a href="{{ url('client') }}"><i class="lnr lnr-users"></i><span>Clients</span></a></li>
                <li><a href="{{ url('project') }}"><i class="lnr lnr-select"></i><span>Projects</span></a></li>
                <li><a href="{{ url('schedules') }}"><i class="lnr lnr-calendar-full"></i><span>Schedules</span></a></li>
                <li><a href="{{ url('user') }}"><i class="lnr lnr-user"></i><span>User</span></a></li>
                <li class="menu-list"><a href="#"><i class="lnr lnr-cog"></i> <span>Configurations</span></a> 
                    <ul class="sub-menu-list">
                        <li><a href="#">Roles</a> </li>
                        <li><a href="#">Permissions</a></li>
                        <li><a href="#">Project Statuses</a></li>
                    </ul>
                </li>
            </ul>
        <!--sidebar nav end-->
    </div>
</div>
<!-- left side end-->
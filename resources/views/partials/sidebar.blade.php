<div id="wrapper">

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <hr class="sidebar-divider my-0">
        @if(Auth::user()->role === 'admin') <!-- Pastikan 'role' sesuai dengan kolom di database Anda -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-fw fa-server"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('relay')}}">
                    <i class="fas fa-fw fa-toggle-on"></i>
                    <span>Relay</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('sensor')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Sensor</span>
                </a>
            </li>
            <hr class="sidebar-divider">
        @endif
    </ul>

<x-app-layout>
    <div id="wrapper">

    <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <hr class="sidebar-divider my-0">


        <li class="nav-item active">
            <a class="nav-link" href="{{route('admin.dashboard')}}">
                <i class="fas fa-fw fa-server"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item active">
            <a class="nav-link" href="{{route('admin.edit')}}">
                <i class="fas fa-fw fa-toggle-on"></i>
                <span>Edit User</span>
            </a>
        </li>
        <hr class="sidebar-divider">
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <div class="container-fluid">
                <br>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                </div>

                <!-- User Profile Card -->
                <div class="row">
                    <div>
                    <!-- <div class="col-xl-3 col-md-6 mb-4"> -->
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-l font-weight-bold text-info text-uppercase mb-1">User Profile</div>
                                    <div class="text-s font-weight-bold text-gray-500 mb-1">Name: {{ Auth::user()->name }}</div>
                                    <div class="text-s font-weight-bold text-gray-500 mb-1">Email: {{ Auth::user()->email }}</div>
                                    <div class="text-s font-weight-bold text-gray-500 mb-1">Joined: {{ Auth::user()->created_at->format('d M Y') }}</div>
                                    <div class="row no-gutters align-items-center mt-2">
                                        <div class="col">
                                            <a href="{{ route('profile.edit') }}" class="btn btn-info btn-block">Edit Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </div>
        </div>

        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2021</span>
                </div>
            </div>
        </footer>
    <!-- </div>
    </div> -->

    <script src="{{ asset('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('sbadmin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{ asset('sbadmin/js/sb-admin-2.min.js')}}"></script>

</x-app-layout>

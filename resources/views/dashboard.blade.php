<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>WiThink</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="{{ asset('sbadmin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="{{ asset('sbadmin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    </head>

    <body id="page-top">
        <div id="wrapper">
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <hr class="sidebar-divider my-0">
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
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-l font-weight-bold text-info text-uppercase mb-1">User  Profile</div>
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
                        <!-- /.container-fluid -->
                    </div>
                </div>

                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2021</span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="{{ asset('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('sbadmin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
        <script src="{{ asset('sbadmin/js/sb-admin-2.min.js')}}"></script>
    </body>

    </html>
</x-app-layout>

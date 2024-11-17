<x-app-layout>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>WiThing</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:checked+.slider:before {
            transform: translateX(26px);
        }

        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    <script type="text/javascript" src="{{asset('jquery/jquery.min.js')}}"></script>
    <!-- <script type="text/javascript" src="{{asset('customJS\control.js')}}"></script> -->
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            // Fetch the CSRF token from the meta tag
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Add event listeners to the toggle switches
            document.getElementById('toggleSwitchRelay1').addEventListener('change', function() {
                let state = this.checked ? 1 : 0;
                controlRelay(1, state);
            });

            document.getElementById('toggleSwitchRelay2').addEventListener('change', function() {
                let state = this.checked ? 1 : 0;
                controlRelay(2, state);
            });

            function controlRelay(relayId, state) {
                fetch("{{ url('control-relay') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token
                        },
                        body: JSON.stringify({
                            relay_id: relayId,
                            state: state
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message) {
                            console.log(data.message);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }

            //fetch data relay
            function fetchRelayData() {
                $.get("{{ url('get-relay-data') }}", function(data) {
                    // Update toggle switch status based on relay data
                    updateToggleSwitchStatus(1, data.relay1 === '1');
                    updateToggleSwitchStatus(2, data.relay2 === '1');
                });
            }

            // Function to update toggle switch status based on relay data
            function updateToggleSwitchStatus(relayId, state) {
                const toggleSwitch = document.getElementById('toggleSwitchRelay' + relayId);
                toggleSwitch.checked = state;
            }
            // Fetch data periodically
            $(document).ready(function() {
                setInterval(function() {
                    fetchRelayData();

                }, 1000);
            });
        });
    </script>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('sbadmin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


    <!-- Custom styles for this template-->
    <link href="{{ asset('sbadmin/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
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
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->


                <!-- Begin Page Content -->
                <div class="container-fluid">
<br>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Relay Control</h1>

                    </div>

                    <!-- Content Row -->
                    <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-info text-uppercase mb-1">Pompa Air</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col">
                                                    <!-- Toggle switch -->
                                                    <label class="switch">
                                                        <input type="checkbox" id="toggleSwitchRelay1">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-info text-uppercase mb-1">Pompa Sprinkle</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col">
                                                    <!-- Toggle switch -->
                                                    <label class="switch">
                                                        <input type="checkbox" id="toggleSwitchRelay2">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
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
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
    </div>
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->


    <script src="{{ asset('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sbadmin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sbadmin/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('sbadmin/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('sbadmin/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{ asset('sbadmin/js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>
</x-app-layout>

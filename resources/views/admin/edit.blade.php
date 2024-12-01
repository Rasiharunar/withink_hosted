<x-app-layout>
<div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <div class="container-fluid">
                <br>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">EDIT</h1>
                </div>

                <!-- User Profile Card -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Joined</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('admin.destroy', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Relay State</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Relay 1</th>
                                    <th>Relay 2</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($relays as $relay)
                                <tr>
                                    <td>{{ $relay->user_id }}</td>
                                    <td>{{ $relay->relay1 }}</td>
                                    <td>{{ $relay->relay2 }}</td>
                                    <td>{{ $relay->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit', $relay->user_id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('admin.destroy', $relay->user_id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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

        <script src="{{ asset('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('sbadmin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
        <script src="{{ asset('sbadmin/js/sb-admin-2.min.js')}}"></script>
    </div>
</x-app-layout>

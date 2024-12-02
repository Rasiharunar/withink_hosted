<x-guest-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Masukkan Kode Admin</h1>
                            </div>
                            <form method="POST" action="{{ route('validate_admin_code') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="admin_code" class="form-control form-control-user" placeholder="Kode Admin" required>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        {{ $errors->first() }}
                                    </div>
                                @endif
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Verifikasi Kode
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</x-guest-layout>

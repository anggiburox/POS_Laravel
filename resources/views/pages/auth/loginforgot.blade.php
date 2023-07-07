<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Laporan Transaksi Harian Outlet</title>


    <link href="{{asset('assets/logo/logo.jpg') }}" rel="shortcut icon">
    <!-- Site favicon -->

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link href="{{asset('assets/styles/core.css') }}" rel="stylesheet">
    <link href="{{asset('assets/styles/style-login.css') }}" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <h2 class="text-center text-primary mt-3" style="color: #22bcc6 !important;">Laporan Transaksi Harian
                    Outlet
                </h2>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="{{asset('assets/logo/logo.jpg') }}" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        <form action="login" method="post" id="login-form">
                            <div class="login-title">
                                <h2 class="text-center text-primary" style="color: #22bcc6 !important;">Login</h2>
                            </div>
                            @csrf
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" placeholder="Username" required
                                    name="username">
                            </div>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" placeholder="**********"
                                    required name="password">
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button type="submit" class="btn btn-lg btn-block"
                                            style="color: white;background-color: #22bcc6;">Sign In</button>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <a class="text-primary" href="#" id="forgot-link">Forgot Password </a>
                            </div>
                        </form>

                        <form action="auth/loginforgot/updatelupapassword" method="post" id="forgot-form"
                            style="display: none;">
                            <div class="login-title">
                                <h2 class="text-center text-primary" style="color: #22bcc6 !important;">Forgot Password
                                </h2>
                            </div>
                            <div class='alert alert-warning alert-dismissible fade show'>
                                Username harus terdaftar terlebih dahulu
                            </div>
                            @csrf
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" placeholder="Username" required
                                    name="username">
                            </div>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" placeholder="**********"
                                    required name="password">
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button type="button" class="btn btn-lg btn-block"
                                            style="color: white;background-color: #22bcc6;"
                                            onclick="form_submit()">Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <p>Already have an account? <a class="text-primary" href="#" id="login-link">Sign
                                        in</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="{{asset('assets/scripts/core.js') }}"></script>
    <script src="{{asset('assets/scripts/script.min.js') }}"></script>
    <script src="{{asset('assets/scripts/process.js') }}"></script>
    <script src="{{asset('assets/scripts/layout-settings.js') }}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    // Ambil elemen-elemen yang diperlukan
    const loginForm = document.getElementById('login-form');
    const forgotForm = document.getElementById('forgot-form');
    const loginLink = document.getElementById('login-link');
    const signupLink = document.getElementById('forgot-link');

    // Atur tindakan ketika tombol "Sign in" diklik
    loginLink.addEventListener('click', function(event) {
        event.preventDefault();
        loginForm.style.display = 'block';
        forgotForm.style.display = 'none';
    });

    // Atur tindakan ketika tombol "Sign up" diklik
    signupLink.addEventListener('click', function(event) {
        event.preventDefault();
        loginForm.style.display = 'none';
        forgotForm.style.display = 'block';
    });

    function form_submit() {
        // Menjalankan validasi form sebelum menampilkan konfirmasi
        if (document.getElementById('forgot-form').checkValidity()) {
            swal({
                title: "Konfirmasi",
                text: "Apakah Anda yakin memperbaharui data ini?",
                icon: "warning",
                buttons: ["Batal", "Ya"],
                dangerMode: true,
            }).then((confirm) => {
                if (confirm) {
                    document.getElementById('forgot-form').submit();
                }
            });
        } else {
            // Menampilkan pesan error jika validasi form gagal
            swal({
                icon: 'error',
                title: 'Oops...',
                text: 'Harap lengkapi semua kolom yang diperlukan!',
            });
        }
    }
    </script>
</body>

</html>
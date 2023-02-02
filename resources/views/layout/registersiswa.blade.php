<!DOCTYPE html>
<html>


<!-- Mirrored from wrappixel.com/demos/admin-templates/materialart/html/ltr/authentication-register2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 Jan 2023 14:20:30 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('material/wrappixel.com/demos/admin-templates/materialart/assets/images/favicon.png') }}">
    <title>J-On | Register Siswa</title>
    <link href="{{ asset('material/wrappixel.com/demos/admin-templates/materialart/dist/css/style.css') }}" rel="stylesheet">
    <!-- This page CSS -->
    <link href="{{ asset('material/wrappixel.com/demos/admin-templates/materialart/dist/css/pages/authentication.css') }}" rel="stylesheet">
    <!-- This page CSS -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label">J-On | Jurnal Online</p>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{ asset('material/wrappixel.com/demos/admin-templates/materialart/assets/images/big/auth-bg2.jpg') }}) no-repeat left center;">
            <div class="container">
                <div class="row">
                    <div class="col s12 l8 m6 demo-text">
                        {{-- <span class="db"><img src="{{ asset('material/wrappixel.com/demos/admin-templates/materialart/assets/images/logo-icon.png') }}" alt="logo" /></span>
                        <span class="db"><img src="{{ asset('material/wrappixel.com/demos/admin-templates/materialart/assets/images/logo-text.png') }}" alt="logo" /></span> --}}
                        <h1 class="font-light m-t-40">Selamat Datang di <span class="font-medium black-text">J-On</span></h1>
                        <p>Selamat Datang di J-On Silahkan Registerasi Akun Anda.</p>
                        <a href="/login" class="btn btn-round red m-t-5">Login</a>
                    </div>
                </div>
                <div class="auth-box auth-sidebar">
                    <div id="loginform">
                        <div class="p-l-10">
                            <h5 class="font-medium m-b-0 m-t-40">Silahkan Daftarkan Akun Anda</h5>
                            <small>Masukkan Data Anda</small>
                        </div>
                        <!-- Form -->
                        <div class="row">
                            <form class="col s12" action="/registerusersiswa" method="POST">
                                @csrf
                                <!-- email -->
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" type="number" name="nissiswa" class="validate" required>
                                        <label for="name">NIS</label>
                                    </div>
                                </div>
                                @error('nissiswa')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" type="text" name="name" class="validate" required>
                                        <label for="name">Nama Siswa</label>
                                    </div>
                                </div>
                                <!-- email -->

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" type="text" name="kelas"  class="validate" required>
                                        <label for="name">Kelas Siswa</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" type="text" name="jurusan" class="validate" required>
                                        <label for="name">Jurusan Siswa</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" type="text" name="alamatsiswa" class="validate" required>
                                        <label for="name">Alamat Siswa</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" type="number" name="notlpsiswa" class="validate" required>
                                        <label for="name">No Telepon Siswa</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="email" type="email" name="email" class="validate" required>
                                        <label for="email">Masukkan Email</label>
                                    </div>
                                </div>
                                @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                <!-- pwd -->
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="password" type="password" name="password" class="validate" required>
                                        <label for="password">Buat Password</label>
                                    </div>
                                </div>
                                @error('password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="kd_guru" type="text" name="kd_guru" class="validate" required>
                                        <label for="kd_guru">Masukkan Kode Guru Pembimbing Anda</label>
                                    </div>
                                </div>
                                <!-- pwd -->
                                {{-- <div class="row">
                                    <div class="input-field col s12">
                                        <input id="cpassword" type="password"  class="validate" required>
                                        <label for="cpassword">Password</label>
                                    </div>
                                </div> --}}
                                <!-- pwd -->
                                {{-- <div class="row m-t-5">
                                    <div class="col s7">
                                        <label>
                                            <input type="checkbox" />
                                            <span>Agree to all Terms</span>
                                        </label>
                                    </div>
                                </div> --}}
                                <!-- pwd -->
                                <div class="row m-t-40">
                                    <div class="col s12">
                                        <button class="btn-large w100 red" type="submit">Sign Up</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="center-align m-t-20 db">
                            Sudah Punya Akun? <a href="/login">Login DIsini!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{ asset('material/wrappixel.com/demos/admin-templates/materialart/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('material/wrappixel.com/demos/admin-templates/materialart/dist/js/materialize.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
    </script>
</body>


<!-- Mirrored from wrappixel.com/demos/admin-templates/materialart/html/ltr/authentication-register2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 Jan 2023 14:20:30 GMT -->
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cendekiaku Science</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css')}}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css')}}">
    <link rel="shortcut icon" href="{{ asset('img/logo.png')}}" type="image/x-icon">
    <style type="text/css">
        .dropdown-item.active,
        .dropdown-item:active {
            color: #f4ec10;
            text-decoration: none;
            background-color: #046314;
        }
        .panel {
            padding: 15px;
        }
        .panel i{
            width: 60px;
            height: 60px;
            color: #046314;
        }
        .panel h4{
            font-size: 16px;
            font-weight: bold;
            margin-top: 2px;
        }
        .panel p{
            font-size: 14px;
            color: gray;
            font-weight: 200;
        }
        @media (max-width: 576px) {
            .jumbotron .display-4 {
                font-size: 28px !important;
            }
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="banner">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 panel">
                        <div class="row">
                            <div class="col-lg">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('img/logo.png')}}" class="img-fluid" width="100" alt="">
                                    <img src="{{ asset('img/perpus1.png')}}" class="img-fluid" alt="" width="110">
                                </a>
                            </div>
                            <div class="col-lg mt-3">
                                <i class="fa fa-envelope fa-3x float-left"></i>
                                <h4 class="mt-1">perpustakaan@cku.ac.id <br>
                                </h4>
                                <p>GET IN TOUCH WITH EMAIL</p>
                            </div>
                            <div class="col-lg mt-3">
                                <i class="fa fa-clock-o fa-3x float-left"></i>
                                <h4>
                                    Senin - Jumat <br>
                                    08.00 - 16.00
                                </h4>
                                <p>OUR OFFICE HOUR</p>
                            </div>
                            <div class="col-lg mt-3">
                                <i class="fa fa-phone fa-3x float-left"></i>
                                <h4>
                                    024 - 76440587 <br>
                                    082135675554
                                </h4>
                                <p>CALL US TODAY</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-md navbar-dark" style="background: #046314">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->segment(1) == '') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ url('/') }}">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ url('/') }}">Panduan</a>
                        </li>
                        @auth
                            <li class="nav-item dropdown {{ (request()->segment(2) == 'skripsi') ? 'active' : '' }} {{ (request()->segment(2) == 'jurnal') ? 'active' : '' }} {{ (request()->segment(1) == 'skpi') ? 'active' : '' }}">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Penelitian Anda <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item {{ (request()->segment(2) == 'skripsi') ? 'active' : '' }}" href="{{ route('skripsi') }}">Skripsi</a>
                                    <a class="dropdown-item {{ (request()->segment(2) == 'jurnal') ? 'active' : '' }}" href="{{ route('jurnal')}}">Jurnal</a>
                                    <a class="dropdown-item" href="#">Praktek Kerja</a>
                                    <a class="dropdown-item {{ (request()->segment(1) == 'skpi') ? 'active' : '' }}" href="{{ route('skpi.index')}}">SKPI</a>
                                </div>
                            </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link {{ (request()->segment(1) == 'login') ? 'active' : '' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link {{ (request()->segment(1) == 'register') ? 'active' : '' }}" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @yield('search')
        <main class="py-4">
            @yield('content')
        </main>
        <!-- Footer -->
        <footer class="text-center text-lg-start text-white" style="background: #046314;">
            <!-- Section: Links  -->
            <section class="p-1">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h5 class="text-uppercase fw-bold mb-4">
                                Perpustakaan<br>STIE Cendekia Karya Utama
                            </h5>
                            <p>
                                Here you can use rows and columns to organize your footer content. Lorem ipsum
                                dolor sit amet, consectetur adipisicing elit.
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Products
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Angular</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">React</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Vue</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Laravel</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Useful links
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Pricing</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Settings</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Orders</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Help</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Contact
                            </h6>
                            <p><i class="fa fa-home me-3"></i> STIE Cendekia Karya Utama</p>
                            <p>
                                <i class="fa fa-envelope me-3"></i>
                                admin@cendekiaku.ac.id
                            </p>
                            <p><i class="fa fa-phone me-3"></i> + 01 234 567 88</p>
                            <p><i class="fa fa-print me-3"></i> + 01 234 567 89</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->
            <!-- Copyright -->
            <div class="text-center text-white p-4">
                © 2021 Copyright:
                <a class="text-reset text-warning" href="https://cendekiaku.ac.id/" target="_blank">STIE Cendekia Karya Utama</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->

    </div>
    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Bootstrap 4 -->
		<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
    @stack('scripts')
</body>
</html>

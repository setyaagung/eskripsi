<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cendekiaku Science</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/logo.png')}}" type="image/x-icon">
</head>
<body>
    <div id="app">
        <nav class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ url('/') }}" class="navbar-brand">
                            <img src="{{ asset('img/logo.png')}}" class="img-fluid" width="100" alt="">
                            <img src="{{ asset('img/perpus.png')}}" class="img-fluid" alt="" width="200">
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-md navbar-dark" style="background: #14279B;">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ url('/') }}">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ url('/') }}">Program Studi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ url('/') }}">Panduan</a>
                        </li>
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
        <footer class="text-center text-lg-start text-white" style="background: #14279B;">

            <!-- Section: Links  -->
            <section class="p-1">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                <img src="{{ asset('img/logo.png')}}" class="img-fluid" width="50" alt=""> STIE Cendekia Karya Utama
                            </h6>
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
                    <p><i class="fa fa-home me-3"></i> New York, NY 10012, US</p>
                    <p>
                      <i class="fa fa-envelope me-3"></i>
                      info@example.com
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
                <a class="text-reset text-warning" href="https://cendekiaku.ac.id/">STIE Cendekia Karya Utama</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->

    </div>
</body>
</html>

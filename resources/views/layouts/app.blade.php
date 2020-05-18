<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('modules/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/bootstrap-social/bootstrap-social.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">

    <!-- General JS Scripts -->
    <script src="{{ asset('modules/jquery.min.js') }}"></script>
    <script src="{{ asset('modules/popper.js') }}"></script>
    <script src="{{ asset('modules/tooltip.js') }}"></script>
    <script src="{{ asset('modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('modules/moment.min.js') }}"></script>
    <script src="{{ asset('js/stisla.js') }}"></script>
</head>
<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <a href="#" class="nav-link sidebar-gone-show mt-4" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
            </nav>

            <nav class="navbar navbar-secondary navbar-expand-lg">
                <div class="container">
                    <ul class="navbar-nav">
                        <li class="nav-item @if(Request::route()->getName() == '') active @endif">
                            <a href="{{ url('/') }}" class="nav-link"><i class="fa fa-home"></i><span>Home</span></a>
                        </li>
                        @if (Auth::check())
                            <li class="nav-item dropdown @if(Request::route()->getName() == 'isi_formulir' || Request::route()->getName() == 'lihat_formulir') active @endif">
                                <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fa fa-sticky-note"></i><span>Formulir PPDB</span></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="{{ url('/isi_formulir') }}" class="nav-link"><span>Lengkapi Data Formulir</span></a>
                                        <a href="{{ url('/lihat_formulir') }}" class="nav-link"><span>Lihat Data Formulir</span></a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li class="nav-item @if(Request::route()->getName() == 'cara_mendaftar') active @endif">
                            <a href="{{ url('/') }}" class="nav-link"><i class="fa fa-info"></i><span>Cara Mendaftar</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link"><i class="fas fa-bullhorn"></i><span>Pengumuman</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link"><i class="fa fa-info"></i><span>Tentang Aplikasi</span></a>
                        </li>
                        @guest
                            <li class="nav-item  @if(Request::route()->getName() == 'register') active @endif">
                                <a href="{{ route('register') }}" class="nav-link"><i class="fa fa-user"></i><span>Daftar Akun</span></a>
                            </li>
                            <li class="nav-item @if(Request::route()->getName() == 'login') active @endif">
                                <a href="{{ route('login') }}" class="nav-link"><i class="fa fa-sign-in-alt"></i><span>Masuk</span></a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>{{ Auth::user()->name }}</span></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        @yield('header')
                    </div>
                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>
            </div>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; <?php echo date('Y');?> <div class="bullet"></div><span class="text-primary">Si-PPDB</span> Powered by <a href="">Sischool</a>
                </div>
            </footer>
        </div>
    </div>

    <!-- JS Libraies -->
    <script src="{{ asset('modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-slider.js') }}"></script>
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>

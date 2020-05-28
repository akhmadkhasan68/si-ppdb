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
<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <ul class="navbar-nav mr-3  mr-auto">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                </ul>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <a href="features-activities.html" class="dropdown-item has-icon">
                                <i class="fas fa-bolt"></i> Activities
                            </a>
                            <a href="features-settings.html" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href=>SI-PPDB</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index-2.html">St</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class="@if(Request::route()->getName() == 'dashboard') active @endif"><a class="nav-link" href="{{ url('dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                        <li class=" @if(Request::route()->getName() == 'data_pendaftaran') active @endif"><a class="nav-link" href="{{ url('data_pendaftaran') }}"><i class="fa fa-sticky-note"></i> <span>Pendaftaran</span></a></li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fa fa-cog"></i><span>Pengaturan</span></a>
                            <ul class="dropdown-menu">
                                <li class=><a class="nav-link" href="index-0.html">Hak Akses</a></li>
                                <li><a class="nav-link" href="index-2.html">Informasi Sekolah</a></li>
                            </ul>
                        </li>
                        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-primary btn-lg btn-block btn-icon-split">
                            <i class="fas fa-power-off"></i> Logout
                            </a>
                        </div>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('header')</h1>
                    </div>
                    
                    @yield('content')
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

    @yield('js')
</body>
</html>

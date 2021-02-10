{{-- <html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel 8 User Roles and Permissions Tutorial') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel 8 User Roles and Permissions - ItSolutionStuff.com
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                        <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                        <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>
                        <li><a class="nav-link" href="{{ route('products.index') }}">Manage Product</a></li>
                        <li>
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                        </li>
                        <li>
                            <div>
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Laravel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- jvectormap -->
    <link href="{{ asset('plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet">

    <!-- App css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="enlarge-menu">
    <div class="page-wrapper">
        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- Navbar -->
            <nav class="navbar-custom">
                <ul class="list-unstyled topbar-nav float-right mb-0">
                    @guest
                        <li>
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @else
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown"
                                href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="ml-1 nav-user-name hidden-sm">{{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                                                                                                                    document.getElementById('logout-form').submit();"><i
                                        data-feather="power" class="align-self-center icon-xs icon-dual mr-1"></i> Выйти</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
                <!--end topbar-nav-->

                <ul class="list-unstyled topbar-nav mb-0">
                    <li class="creat-btn">
                        <div class="nav-link">
                            <a class=" btn btn-sm btn-soft-primary" href="{{ route('home') }}" role="button"><i
                                    class="fas fa-globe-asia"></i> Все клиенты</a>
                        </div>
                    </li>
                    <li class="creat-btn">
                        <div class="nav-link">
                            <a class=" btn btn-sm btn-soft-primary" href="{{ route('clients.create') }}"
                                role="button"><i class="fas fa-plus mr-2"></i>Добавить клиента</a>
                        </div>
                    </li>
                    <li class="creat-btn">
                        <div class="nav-link">
                            @can('role-create')
                                <a class=" btn btn-sm btn-soft-primary" href="{{ route('roles.index') }}"
                                    role="button"><i class="fas fa-user-tag"></i> Все роли</a>
                                @elsecan('role-list')
                                <a class=" btn btn-sm btn-soft-primary" href="{{ route('roles.index') }}"
                                    role="button"><i class="fas fa-user-tag"></i> Все роли</a>
                            @endcan
                        </div>
                    </li>

                    <li class="creat-btn">
                        <div class="nav-link">
                            @can('user-create')
                                <a class=" btn btn-sm btn-soft-primary" href="{{ route('users.index') }}"
                                    role="button"><i class="fas fa-users"></i> Все пользователи</a>
                                @elsecan('user-list')
                                <a class=" btn btn-sm btn-soft-primary" href="{{ route('users.index') }}"
                                    role="button"><i class="fas fa-users"></i> Все пользователи</a>
                            @endcan
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->

        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div><!-- container -->

            <footer class="footer text-center text-sm-left">
                &copy; 2020 CRM <span class="d-none d-sm-inline-block float-right">Crafted with <i
                        class="mdi mdi-heart text-danger"></i> by Zalkar</span>
            </footer>
            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->




    <!-- jQuery  -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/metismenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-us-aea-en.js') }}"></script>
    <script src="{{ asset('assets/pages/jquery.analytics_dashboard.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>

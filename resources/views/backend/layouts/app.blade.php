{{-- <a class="navbar-brand" href="{{ url('/') }}">
    {{ config('app.name', 'Laravel') }}
</a>


 --}}


<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/fontawesome.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/brands.min.css" />
    <link rel="icon" type="image/x-icon" href="https://jhalakdhami.com.np/jhalak.jpg">

    @yield('style')
</head>

<body class="hold-transition  sidebar-mini  layout-fixed">
    <div class="wrapper " style="max-width: 1900px;">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <h1 class="py-3 px-4 text-center animation__shake">Loading..</h1>
        </div> --}}
        @include('sweetalert::alert')
        <!-- Navbar -->
        <nav class="main-header  sticky-top navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>


            <!-- Right navbar links -->
            <ul class="navbar-nav ">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto"></ul>

                <ul class="navbar-nav ms-auto">
                    @guest
                        {{-- @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif --}}
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end mt-2" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar  sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/home') }}" class="brand-link">
                <span class="brand-text  font-weight-lignt text-white">School Management System</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar py-3">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item ">
                            <a href="{{ url('home') }}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                                <i class="nav-icon bx bxs-dashboard"></i>
                                <p valign="top">
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is('home/teachers') ? 'active' : '' }}{{ request()->is('home/teachers/create') ? 'active' : '' }} {{ request()->is('teachers/*/edit') ? 'active' : '' }}">
                                <i class="nav-icon  bx bx-user"></i>
                                <p>
                                    Teachers
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{    route('teachers.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            All Teachers
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{    route('teachers.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Add New
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item " >
                            <a href="#" class="nav-link {{ request()->is('home/students/*') ? 'active' : '' }}  {{ request()->is('home/students') ? 'active' : '' }}">
                                <i class="nav-icon bx bx-book-reader"></i>
                                <p valign="top">
                                    Students
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('students.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            All Students
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('students.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Add New
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is('home/faculties/*') ? 'active' : '' }}  {{ request()->is('home/faculties') ? 'active' : '' }}">
                                <i class="nav-icon  bx bx-book-bookmark"></i>

                                <p>
                                    Faculties
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('faculty.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Faculties</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('faculty.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add New</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is('home/classes/*') ? 'active' : '' }}  {{ request()->is('home/classes') ? 'active' : '' }}">
                                <i class='nav-icon bx  bxs-graduation'> </i>
                                <p>Classes
                                    <i class="fas fa-angle-left right"></i>

                                </p>

                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{    route('classes.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Classes</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('classes.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add New</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">OTHERS</li>
                        <li class="nav-item">
                    <a href="{{    route('calander.index')}}" class="nav-link {{ request()->is('home/calander/*') ? 'active' : '' }}  {{ request()->is('home/calander') ? 'active' : '' }}">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Calendar
                                    <span class="badge badge-info right">2</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Gallery
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is('home/notices/*') ? 'active' : '' }}  {{ request()->is('home/notices') ? 'active' : '' }}">
                                <i class='nav-icon  bx bxs-note '></i>
                                <p>Notices</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is('home/admissions/*') ? 'active' : '' }}  {{ request()->is('home/admissions') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Admission
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Computer Engineering</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Science</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Management</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Huminity</p>
                                    </a>
                                </li>

                            </ul>
                        </li>



                        <li class="nav-header">CLASSES</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                {{-- <i class='bx bxs-note' ></i> --}}
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Level 1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    Level 1
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Level 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Level 2
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Level 3</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Level 3</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Level 3</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Level 2</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Level 1</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->

        <main class="py-0">
            @yield('content')
        </main>
        <!-- /.content-wrapper -->
        <footer class="main-footer align-end">
            <strong>Copyright &copy; 2023 <a href="https://jhalakdhami.com.np">School Management System</a>.</strong>
            All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sparklines/sparkline.js') }}"></script>
    <script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('assets/dist/js/demo.js') }}"></script>
    <script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script>
    @yield('script')

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <title>{{ env('APP_NAME') }} - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="MyraStudio" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <!-- App css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/theme.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/toastr.min.css') }}" rel="stylesheet" type="text/css" />
        @yield('css')
    </head>

    <body>

        <!-- Begin page -->
        <div id="layout-wrapper">

            <div class="main-content">

                <header id="page-topbar">
                    <div class="navbar-header">
                        <!-- LOGO -->
                        <div class="navbar-brand-box d-flex align-items-left">
                            <a href="{{ route('home') }}" class="logo">
                                <i class="mdi mdi-album"></i>
                                <span>
                                    {{ env('APP_NAME') }}
                                </span>
                            </a>

                            <button type="button" class="btn btn-sm mr-2 font-size-16 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
                                <i class="fa fa-fw fa-bars"></i>
                            </button>
                        </div>
        
                        <div class="d-flex align-items-center">
        
                            <div class="dropdown d-inline-block ml-2">
                                <button type="button" class="btn header-item waves-effect waves-light"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="rounded-circle header-profile-user" src="{{ asset('/assets/images/users/avatar-3.jpg') }}"
                                        alt="Header Avatar">
                                    <span class="d-none d-sm-inline-block ml-1">{{ auth()->user()->name }}</span>
                                    <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('logout') }}">
                                        <span>Log Out</span>
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </header>

                <div class="topnav">
                    <div class="container-fluid">
                        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                            
                            <div class="collapse navbar-collapse" id="topnav-menu-content">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}">
                                            <i class="mdi mdi-home-analytics"></i>Dashboard
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('labor*') ? 'active' : '' }}" href="{{ route('labor.index') }}">
                                            <i class="mdi mdi-cowboy"></i>Laborer
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('project*') ? 'active' : '' }}" href="{{ route('project.index') }}">
                                            <i class="mdi mdi-boom-gate-up-outline"></i>Project
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('attendance*') ? 'active' : '' }}" href="{{ route('attendance.index') }}">
                                            <i class="mdi mdi-check-network-outline"></i>Attendance
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('salary*') ? 'active' : '' }}" href="{{ route('salary.index') }}">
                                            <i class="mdi mdi-bank-outline"></i>Salary
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item dropdown {{ Request::is('report*') ? 'active' : '' }}">
                                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-charts" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-poll"></i>Reports <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-charts">
                                            <a href="{{ route('report.labor') }}" class="dropdown-item {{ Request::is('report/labor') ? 'active' : '' }}">Labor Report</a>
                                            <a href="{{ route('report.project') }}" class="dropdown-item {{ Request::is('report/project') ? 'active' : '' }}">Project Report</a>
                                            <a href="{{ route('report.salary') }}" class="dropdown-item {{ Request::is('report/salary') ? 'active' : '' }}">Salary Report</a>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>                

                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">@yield('title')</h4>
    
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ env('APP_NAME') }}</a></li>
                                            <li class="breadcrumb-item active">@yield('title')</li>
                                        </ol>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->
                        
                        @yield('content')
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-center text-lg-left">
                                    {{ date('Y') }} ?? {{ env('APP_NAME') }}.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-right d-none d-lg-block">
                                    Design & Develop by {{ env('APP_NAME') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- jQuery  -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/waves.js') }}"></script>
        <script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
    
        @yield('js')
        <!-- App js -->
        <script src="{{ asset('assets/js/theme.js') }}"></script>
        <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
        {!! Toastr::message() !!}

    </body>

</html>
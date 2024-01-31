{{--<!doctype html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--    <!-- CSRF Token -->--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--    <title>{{ (isset($page_title)?$page_title.' - ':'').config('app.name', 'Laravel') }}</title>--}}
{{--    <!-- Ionicons -->--}}
{{--    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">--}}

{{--    <!-- Google Font: Source Sans Pro -->--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">--}}

{{--    <!-- Fonts -->--}}
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}
{{--    <!-- Styles -->--}}
{{--    <!-- Bootstrap CSS -->--}}
{{--    <link rel="stylesheet" href="/temp/bootstrap/css/bootstrap.min.css">--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" integrity="sha384-z4tVnCr80ZcL0iufVdGQSUzNvJsKjEtqYZjiQrrYKlpGow+btDHDfQWkFjoaz/Zr" crossorigin="anonymous">--}}
{{--    <!-- jQuery -->--}}
{{--    <script src="{{ asset('vendor/laravel-file-viewer/officetohtml/jquery/jquery.min.js') }}"></script>--}}
{{--    @include('admin.header')--}}

{{--</head>--}}
{{--<body class="hold-transition bg-light">--}}
{{--<div class="layout-wrapper layout-content-navbar">--}}
{{--    <div class="layout-container">--}}
{{--    @include('admin.sidebar')--}}

{{--<!-- main -->--}}
{{--    <div class="content w-100">--}}
{{--        <nav class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">--}}
{{--            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">--}}
{{--                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">--}}
{{--                    <i class="bx bx-menu bx-sm"></i>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">--}}
{{--                <!-- Search -->--}}
{{--                <div class="navbar-nav align-items-center">--}}
{{--                    <div class="nav-item d-flex align-items-center">--}}
{{--                        <i class="bx bx-search fs-4 lh-0"></i>--}}
{{--                        <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search...">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- /Search -->--}}
{{--                <ul class="navbar-nav flex-row align-items-center ms-auto">--}}
{{--                    <!-- Place this tag where you want the button to render. -->--}}
{{--                    <li class="nav-item lh-1 me-3">--}}
{{--                        <span></span>--}}
{{--                    </li>--}}
{{--                    <!-- User -->--}}
{{--                    <li class="nav-item navbar-dropdown dropdown-user dropdown">--}}
{{--                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">--}}
{{--                            <div class="avatar avatar-online">--}}
{{--                                <img src="/temp/admin/assets/img/avatars/1.png" alt="" class="w-px-40 h-auto rounded-circle">--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu dropdown-menu-end position-absolute end-0" style="left:auto;">--}}
{{--                            <li>--}}
{{--                                <a class="dropdown-item" href="#">--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="flex-shrink-0 me-3">--}}
{{--                                            <div class="avatar avatar-online">--}}
{{--                                                <img src="/temp/admin/assets/img/avatars/1.png" alt="" class="w-px-40 h-auto rounded-circle">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <span class="fw-semibold d-block">{{$name}}</span>--}}
{{--                                            <small class="text-muted">{{$role}}</small>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="dropdown-divider"></div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a class="dropdown-item" href="#">--}}
{{--                                    <i class="bx bx-user me-2"></i>--}}
{{--                                    <span class="align-middle">My Profile</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a class="dropdown-item" href="#">--}}
{{--                                    <i class="bx bx-cog me-2"></i>--}}
{{--                                    <span class="align-middle">Settings</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a class="dropdown-item" href="#">--}}
{{--                  <span class="d-flex align-items-center align-middle">--}}
{{--                  <i class="flex-shrink-0 bx bx-credit-card me-2"></i>--}}
{{--                  <span class="flex-grow-1 align-middle">Billing</span>--}}
{{--                  <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>--}}
{{--                  </span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="dropdown-divider"></div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <form action="{{route('logout')}}" method="post" class="logout">--}}
{{--                                    @csrf--}}
{{--                                    <button type="submit" class="dropdown-item">--}}
{{--                                        <i class="bx bx-power-off me-2"></i>--}}
{{--                                        <span class="align-middle">Log Out</span>--}}
{{--                                    </button>--}}
{{--                                </form>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <!--/ User -->--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </nav>--}}
{{--        <div class="container-fluid">--}}
{{--            @yield('content')--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="layout-overlay layout-menu-toggle"></div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- ./wrapper -->--}}
{{--</body>--}}
{{--<script src="/temp/build/js/admin.min.js"></script>--}}

{{--<script src="/temp/admin/assets/js/main.js"></script>--}}

{{--<script src="/temp/admin/assets/js/dashboards-analytics.js"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>--}}
{{--<script src="/temp/admin/assets/js/bootstrap.bundle.min.js"></script>--}}

{{--<script src="/temp/admin/assets/vendor/js/bootstrap.js"></script>--}}

{{--</html>--}}

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ (isset($page_title)?$page_title.' - ':'').config('app.name', 'Laravel') }}</title>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/temp/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" integrity="sha384-z4tVnCr80ZcL0iufVdGQSUzNvJsKjEtqYZjiQrrYKlpGow+btDHDfQWkFjoaz/Zr" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="{{ asset('vendor/laravel-file-viewer/officetohtml/jquery/jquery.min.js') }}"></script>
{{--    @include('layout.head')--}}

</head>
<body class="hold-transition bg-light">
<!-- <div id="app"></div> -->
<div class="layout-site position-relative">
    <!-- header -->
@include('layout.header')
<!-- main -->
    <div class="content">
        @yield('content')
    </div>
    <!-- footer -->
    @include('layout.footer')
</div>
<!-- ./wrapper -->
</body>
{{--@include('layout.foot')--}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="/temp/admin/assets/js/bootstrap.bundle.min.js"></script>

<script src="/temp/admin/assets/vendor/js/bootstrap.js"></script>

</html>

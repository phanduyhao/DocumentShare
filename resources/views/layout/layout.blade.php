<!DOCTYPE html>
<html lang="en">
<head>
</head>
@include('layout.head')
<body>
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
@include('layout.foot')
</body>
</html>

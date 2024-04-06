<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
</head>
<body>
<div class="layout-site position-relative">
    <!-- header -->
@include('layout.header')
<!-- main -->
        <div class="pb-5">
            @yield('content')
        </div>
    <!-- footer -->
    @include('layout.footer')
</div>
@include('layout.foot')
</body>
</html>

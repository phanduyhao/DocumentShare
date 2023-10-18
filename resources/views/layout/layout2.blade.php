<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
</head>
<body>
<div class="layout-site position-relative">
<!-- main -->
    <div class="content">
        @yield('content')
    </div>
</div>
@include('layout.foot')
</body>
</html>

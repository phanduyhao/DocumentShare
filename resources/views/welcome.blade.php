<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>TRANG CHỦ</h1>
<form action="{{route('logout')}}" method="post" class="logout">
    @csrf
    <button class="btn btn-success px-4 mb-3 font-weight-bold py-2" type="submit">Đăng xuất</button>
</form></body>
</html>

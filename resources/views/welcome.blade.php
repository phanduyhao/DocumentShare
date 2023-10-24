@extends('layout.layout')
@section('contents')
<h1>TRANG CHỦ</h1>
<form action="{{route('logout')}}" method="post" class="logout">
    @csrf
    <button class="btn btn-success px-4 mb-3 font-weight-bold py-2" type="submit">Đăng xuất</button>
</form>
@endsection

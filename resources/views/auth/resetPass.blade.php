@extends('layout.layout2')
@section('content')
    <form method="POST" action="{{ route('reset') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ $email }}" required>
            @error('email')
            <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="password">Mật khẩu mới</label>
            <input type="password" name="password" required>
            @error('password')
            <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="password_confirmation">Nhập lại mật khẩu mới</label>
            <input type="password" name="password_confirmation" required>
        </div>
        <button type="submit">Đặt lại Mật khẩu</button>
    </form>
@endsection

@extends('layout.layout2')
@section('content')
<form method="POST" action="{{ route('forgetPassRequest') }}">
    @csrf
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email')
        <div>{{ $message }}</div>
        @enderror
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
    </div>
    <button type="submit">Gửi Email Reset Mật khẩu</button>
</form>
@endsection

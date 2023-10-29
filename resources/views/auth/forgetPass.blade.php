@extends('layout.layout')
@section('content')
    <div class="main mt-5">
        <div id="step-1" class="container ">
            <div class="d-flex align-items-center justify-content-center">
                <div class="col col-10 px-5">
                    <form  method="POST" action="{{ route('forgetPassRequest') }}" class="forget-password">
                        @csrf
                        <div class="forget-password-titel">
                            <span>Khôi phục mật khẩu</span>
                        </div>
                        <div class="forget-password-titel-sub">
                        <span>Bạn vui lòng điền địa chỉ Email đã dùng để đặt lại mật khẩu!</span>
                        </div>
                        <div>
                            <div class="forget-pass-form d-flex align-items-center justify-content-center">
                                <label class="m-0 fw-bold" for="">Địa chỉ Email:</label>
                                <input type="email" class="form-control w-75 ms-3" name="email" value="{{ old('email') }}" required placeholder="name@example.com">
                            </div>
                            @error('email')
                            <div class="alert alert-danger mx-auto mt-4 p-2" style="width: max-content">
                                {{ $message }}
                            </div>
                            @enderror
                            @if(Session::has('success'))
                                <div class="alert alert-success mx-auto mt-4 p-2" style="width: max-content">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                        </div>
                        <div class="py-4 d-flex align-items-center justify-content-center">
                            <button type="button" class="btn btn-secondary btn-sm me-3">
                                Quay lại
                            </button>
                            <button type="submit" class="btn btn-primary btn-sm px-4">
                                Gửi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


{{--<form class="mt-5" method="POST" action="{{ route('forgetPassRequest') }}">--}}
{{--    @csrf--}}
{{--    <div>--}}
{{--        <label for="email">Email</label>--}}
{{--        <input type="email" name="email" value="{{ old('email') }}" required>--}}
{{--        @error('email')--}}
{{--        <div>{{ $message }}</div>--}}
{{--        @enderror--}}
{{--        @if(Session::has('success'))--}}
{{--            <div class="alert alert-success">--}}
{{--                {{ Session::get('success') }}--}}
{{--            </div>--}}
{{--        @endif--}}
{{--    </div>--}}
{{--    <button type="submit">Gửi Email Reset Mật khẩu</button>--}}
{{--</form>--}}
@endsection

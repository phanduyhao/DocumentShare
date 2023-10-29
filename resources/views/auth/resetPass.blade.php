@extends('layout.layout')
@section('content')

    <div class="main mt-5">
        <div id="step-1" class="container ">
            <div class="d-flex align-items-center justify-content-center">
                <div class="col col-10 px-5">
                    <form  method="POST" action="{{ route('reset') }}" class="forget-password">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="forget-password-titel">
                            <span>Khôi phục mật khẩu</span>
                        </div>
                        <div class="forget-password-titel-sub">
                        <span>Bạn vui lòng nhập mật khẩu mới !</span>
                        </div>
                        <div class="px-5 mb-3">
                            <div class="px-5 forget-pass-form">
                                <label class="form-label fw-bold" for="">Địa chỉ Email:</label>
                                <input type="email" class="form-control" name="email" value="{{ $email }}" disabled>
                            </div>
                            @error('email')
                            <div class="alert alert-danger mx-auto mt-4 p-2" style="width: max-content">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="px-5 mb-3">
                            <div class="px-5 forget-pass-form">
                                <label class="form-label fw-bold" for="">Mật khẩu mới:</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            @error('password')
                            <div class="alert alert-danger mx-auto mt-4 p-2" style="width: max-content">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="px-5">
                            <div class="px-5 forget-pass-form">
                                <label class="form-label fw-bold" for="">Xác nhận mật khẩu mới:</label>
                                <input type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="py-4 d-flex align-items-center justify-content-center">
                            <button type="submit" class="btn btn-primary btn-sm px-4">
                                Đặt lại mật khẩu
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

{{--    <form method="POST" action="{{ route('reset') }}">--}}
{{--        @csrf--}}
{{--        <input type="hidden" name="token" value="{{ $token }}">--}}
{{--        <div>--}}
{{--            <label for="email">Email</label>--}}
{{--            <input type="email" name="email" value="{{ $email }}" required>--}}
{{--            @error('email')--}}
{{--            <div>{{ $message }}</div>--}}
{{--            @enderror--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <label for="password">Mật khẩu mới</label>--}}
{{--            <input type="password" name="password" required>--}}
{{--            @error('password')--}}
{{--            <div>{{ $message }}</div>--}}
{{--            @enderror--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <label for="password_confirmation">Nhập lại mật khẩu mới</label>--}}
{{--            <input type="password" name="password_confirmation" required>--}}
{{--        </div>--}}
{{--        <button type="submit">Đặt lại Mật khẩu</button>--}}
{{--    </form>--}}
@endsection

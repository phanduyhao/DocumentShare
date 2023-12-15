@extends('layout.layout')
@section('content')
    <section class="pt-5" >
        <h1 class="text-center mt-5 fw-bold">Đăng ký tài khoản</h1>
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center ">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="/temp/images/login.png"
                         class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="{{ route('registerForm') }}" method="POST">
                        @csrf
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="lead fw-normal mb-0 me-3">Đăng nhập với</p>
                            <a href="{{ url('auth/google') }}" class="mx-1">
                                <img src="/temp/images/icon/google.png" width="20" alt="">
                            </a>
                        </div>
                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0">Or</p>
                        </div>
                        @include('admin.error')
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="name"  class="form-control form-control-lg"
                                   placeholder="Nhập tên của bạn" />
                        </div>
                        <div class="form-outline mb-4">
                            <input type="email" name="email" class="form-control form-control-lg"
                                   placeholder="Nhập Email" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" name="password" class="form-control form-control-lg"
                                   placeholder="Nhập mật khẩu" />
                        </div>
                        <div class="form-outline mb-3">
                            <input type="password" name="confirmPassword" class="form-control form-control-lg"
                                   placeholder="Nhập lại mật khẩu" />
                        </div>
                        @if(session('error'))
                            <div class="text-danger fw-semibold">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng ký</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Bạn đã có tài khoản? <a href="{{route('login')}}" class="link-danger">Đăng nhập</a></p>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
        .h-custom {
            height: calc(100% - 73px);
        }
        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
    </style>
@endsection

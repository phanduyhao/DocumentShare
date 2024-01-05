@extends('layout.layout')
@section('content')
    <div id="step-1" class="container">
        <div class="d-flex align-items-center justify-content-center">
            <div class="col col-10 px-3">
                <div class="forget-password">
                    <div class="forget-password-titel">
                        <span>Thông tin liên hệ</span>
                    </div>
                    <div class="forget-password-titel-sub">
                            <span>
                                Chúng tôi luôn sẵn sàng lẵng nghe những góp ý của bạn!
                            </span>
                    </div>
                    <form action="" class="forget-pass-form mb-3 ps-5 pe-5">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Họ và tên</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Địa chỉ email</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Lời nhắn</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </form>
                    <div class="py-3 d-flex align-items-center justify-content-center">
                        <button onclick="goToStep2()" type="button" class="btn btn-primary btn-sm px-5 py-1" style="font-size: 20px;">
                            Gửi
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

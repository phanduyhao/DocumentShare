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
                    <form id="feedbackForm" action="{{route('sendFeedBack')}}" method="post" class="forget-pass-form mb-3 ps-5 pe-5">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Họ và tên</label>
                            <input name="name" type="text" class="form-control input-field" id="exampleFormControlInput1" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Địa chỉ email</label>
                            <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Lời nhắn</label>
                            <textarea name="contents" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="py-3 d-flex align-items-center justify-content-center">
                            <button type="submit" class="btn btn-primary btn-send-feedback btn-sm px-5 py-1" style="font-size: 20px;">
                                Gửi
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

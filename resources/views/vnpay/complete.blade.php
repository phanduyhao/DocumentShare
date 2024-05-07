@extends('layout.layout')
@section('content')
    <div class="pt-4 mt-5">
        <div class="site-cart__wrapper py-5 mt-5 mx-auto border rounded" style="max-width:700px">
            <div class="d-flex align-items-center justify-content-center">
                <img src="/temp/images/check_success.png" width="100px" alt="">
                <h1 class="fw-bold">Nạp tiền thành công</h1>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <div class="">
                    <div class="d-flex mb-3 align-items-center border-bottom">
                        <h3 class="fw-bold me-2"> <i> Số hóa đơn: </i></h3>
                        <h4> {{ $checkout->order_code }}</h4>
                    </div>
                    <div class="d-flex mb-3 align-items-center border-bottom">
                        <h3 class="fw-bold me-2"> <i> Số tiền nạp: </i></h3>
                        <h4> {{ $checkout->amount_money }}</h4>
                    </div>
                    <div class="d-flex mb-3 align-items-center border-bottom">
                        <h3 class="fw-bold me-2"> <i> Số điểm cộng: </i></h3>
                        <h4> {{ $score }}</h4>
                    </div>
                    <div class="d-flex mb-3 align-items-center border-bottom">
                        <h3 class="fw-bold me-2"> <i> Trạng thái: </i></h3>
                        <h4>Thành công</h4>
                    </div>
                    <div class="d-flex mb-3 align-items-center border-bottom">
                        <h3 class="fw-bold me-2"> <i> Date: </i></h3>
                        <h4> {{ $checkout->created_at }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

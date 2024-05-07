@extends('layout.layout')
@section('content')
    <div class="main mt-5">
        <div class="container">
            <div class="row pt-5">
                <div class="col col-3">
                    <div class="pr-sub d-flex justify-content-center align-items-center py-2 px-3">
                        <div class="avata-user">
                            <img src="/temp/images/avatars/{{Auth::user()->avatar}}" alt="">
                        </div>
                        <div class="pr-info-sub ms-2">
                            <div class="pr-sub-name">{{Auth::user()->name}}</div>
                            <div class="pr-sub-point d-flex align-items-center">
                                <span>Điểm tích luỹ:</span>
                                <div class="point ms-1">{{Auth::user()->score}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="pr-sub mt-3 ">
                        <div class="pr-sub-nav border-bottom">
                            <a href="{{route('profile')}}" class="pr-sub-nav-item">Thông tin cá nhân</a>
                        </div>
                        <div class="pr-sub-nav border-bottom">
                            <a href="#" class="pr-sub-nav-item">Cập nhật thông tin</a>
                        </div>
                        <div class="pr-sub-nav border-bottom">
                            <a href="#" class="pr-sub-nav-item">Thay đổi mật khẩu</a>
                        </div>
                        <div class="pr-sub-nav border-bottom">
                            <a href="{{route('paymentHistory')}}" class="pr-sub-nav-item">Lịch sử nạp tiền</a>
                        </div>
                        <form action="{{route('logout')}}" method="post" class="logout pr-sub-nav">
                            @csrf
                            <input type="hidden" name="_token" value="aGABVq1t8wgyC2s3Qxf15F5VglX99UZpv7u9Juh8" autocomplete="off">
                            <button type="submit" class="dropdown-item pr-sub-nav-item">
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">Đăng xuất</span>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col col-9">
                    <div class="info-pr-titel">
                        <div class="info-pr-titel-name">
                            Lịch sử nạp tiền 
                        </div>
                    </div>
                    <div class="content-product pt-4">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Mã giao dịch</th>
                                <th scope="col">Số tiền</th>
                                <th scope="col">Số điểm</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Thời gian giao dịch</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($payment_histories as $payment)
                              <tr>
                                <td>
                                    {{ $payment->order_code }}
                                </td>
                                <td>
                                    {{ $payment->amount_money }}
                                </td>
                                <td>
                                    {{ $payment->score }}
                                </td>
                                <td>
                                    @if(empty($payment->vnp_BankTranNo))
                                        <i class="fa-solid text-danger fa-circle-xmark"></i>
                                        Không thành công
                                    @else
                                        <i class="fa-solid text-success fa-circle-check"></i>
                                        Thành công
                                    @endif
                                </td>
                                <td>
                                    {{ $payment->created_at }}
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

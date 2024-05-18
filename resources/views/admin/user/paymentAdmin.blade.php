@extends('admin.main')
@section('contents')
    <div class="container-fluid flex-grow-1 container-p-y">
        <h3 class="fw-bold text-primary py-3 mb-4">{{$title}}</h3>
        <div class="card">
            <div class="d-flex p-4 justify-content-between">
                <h5 class=" fw-bold">Danh sách giao dịch người dùng</h5>
            </div>
            <ul class="nav nav-pills mb-3 justify-content-center bg-white py-3 rounded-2" id="pills-tab" role="tablist">
                <li class="nav-item me-3" role="presentation">
                    <button class="nav-link fw-bold active" id="pills-doc-normal-tab" data-bs-toggle="pill" data-bs-target="#pills-doc-normal" type="button" role="tab" aria-controls="pills-doc-normal" aria-selected="false" style="width: 150px" tabindex="-1">Giao dịch thành công</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bold " id="pills-doc-vip-tab" data-bs-toggle="pill" data-bs-target="#pills-doc-vip" type="button" role="tab" aria-controls="pills-doc-vip" aria-selected="true" style="width: 150px">Giao dịch thất bại</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                {{--                Tài liệu thường             --}}
                <div class="tab-pane fade show active" id="pills-doc-normal" role="tabpanel" aria-labelledby="pills-doc-normal-tab" tabindex="0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Order_Code</th>
                                <th>Money</th>
                                <th>Score</th>
                                <th>Status</th>
                                <th>Created_at</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            @foreach($payments_oks as $payments_ok)
                                <tr >
                                    <td> {{ $loop->iteration }}</td>
                                    <td> {{ $payments_ok->User->name }}</td>
                                    <td> {{ $payments_ok->order_code }}</td>
                                    <td> {{ $payments_ok->amount_money }}</td>
                                    <td> {{ $payments_ok->score }}</td>
                                    <td>
                                        <i class='bx bx-check-circle text-success' ></i>
                                        Thành công
                                    </td>
                                    <td> {{ $payments_ok->created_at }}</td>
                                 
                                </tr>

                                <!-- Modal Edit -->

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
{{--                Tài liệu Vip                --}}
                <div class="tab-pane fade" id="pills-doc-vip" role="tabpanel" aria-labelledby="pills-doc-vip-tab" tabindex="0">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Order_Code</th>
                                <th>Money</th>
                                <th>Score</th>
                                <th>Status</th>
                                <th>Created_at</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            @foreach($payments_nots as $payments_not)
                                <tr>
                                    <td> {{ $loop->iteration }}</td>
                                    <td> {{ $payments_not->User->name }}</td>
                                    <td> {{ $payments_not->order_code }}</td>
                                    <td> {{ $payments_not->amount_money }}</td>
                                    <td> {{ $payments_not->score }}</td>
                                    <td>
                                        <i class='bx bxs-x-circle text-danger'></i>                                        
                                        Thất bại
                                    </td>
                                    <td> {{ $payments_not->created_at }}</td>
                                </tr>

                                <!-- Modal Edit -->

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                
        </div>
    </div>
@endsection

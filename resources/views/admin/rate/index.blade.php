@extends('admin.main')
@section('contents')
    <div class="container-fluid flex-grow-1 container-p-y">
        <h3 class="fw-bold text-primary py-3 mb-4">{{$title}}</h3>
{{--        <h1>TEST</h1>--}}
{{--        @foreach($averageRates as $averageRate)--}}
{{--            <p>Document ID: {{ $averageRate->document_id }} - Average Rate: {{ round($averageRate->average_rate,1) }}</p>--}}
{{--        @endforeach--}}
        <div class="card">
            <div class="d-flex p-4 justify-content-between">
                <h5 class=" fw-bold">Danh sách đánh giá</h5>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>User</th>
                        <th>Rating Document</th>
                        <th>Rate</th>
                        <th>Time</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0 text-center">
                    @foreach($rates as $rate)
                        <tr data-id="{{$rate->id}}">
                            <td>{{$rate->id}}</td>
                            <td>{{$rate->User->name}}</td>
                            <td>{{$rate->Document->title}}</td>
                            <td>{{$rate->rates}} / 100%</td>
                            <td>{{$rate->updated_at}}</td>
                            <td>
                                <button type="button" data-url="/admin/rates/{{$rate->id}}" data-id="{{$rate->id}}" class="btn btn-danger btnDeleteAsk px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>
                            </td>
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteModalLabel">Bạn có chắc chắn xóa bản ghi này vĩnh viễn không ?</h1>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="delete-forever btn btn-danger" data-id="{{ $rate->id }}">Xóa</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination mt-4 pb-4">
                    {{ $rates->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('admin.main')
@section('contents')
    <div class="container-fluid flex-grow-1 container-p-y">
        <h3 class="fw-bold text-primary py-3 mb-4">{{$title}}</h3>
        <div class="card">
            <div class="d-flex p-4 justify-content-between">
                <h5 class=" fw-bold">Danh sách yêu thích</h5>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>User</th>
                        <th>Favourite Document</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0 text-center">
                    @foreach($favourites as $favourite)
                        <tr data-id="{{$favourite->id}}">
                            <td>{{$favourite->id}}</td>
                            <td>{{$favourite->User->name}}</td>
                            <td>{{$favourite->Document->title}}</td>
                            <td>
                                <button type="button" data-url="/admin/favourites/{{$favourite->id}}" data-id="{{$favourite->id}}" class="btn btn-danger btnDeleteAsk px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>
                            </td>
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteModalLabel">Bạn có chắc chắn xóa bản ghi này vĩnh viễn không ?</h1>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="delete-forever btn btn-danger" data-id="{{ $favourite->id }}">Xóa</button>
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
                    {{ $favourites->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

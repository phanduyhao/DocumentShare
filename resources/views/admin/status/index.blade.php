@extends('admin.main')
@section('contents')
    <div class="container-fluid flex-grow-1 container-p-y">
        <h3 class="fw-bold text-primary py-3 mb-4">{{$title}}</h3>
        <div class="card">
            <div class="d-flex p-4 justify-content-between">
                <h5 class=" fw-bold">Danh sách trạng thái</h5>
                <button type="button" data-id="" class="btn btn-success text-dark px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#createStatus">Thêm mới</button>
            </div>
            <div class="modal fade" id="createStatus" tabindex="-1" aria-labelledby="createStatusLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="createStatusLabel">Thêm mới trạng thái.</h1>
                        </div>
                        <div class="card-body">
                            <div class="error">
                                @include('admin.error')
                            </div>
                            <form id="form_status_store" class="form-create" method='POST' action='{{route('statuses.store')}}'>
                                @csrf
                                <div class='mb-3'>
                                    <label
                                        class='form-label'
                                        for='basic-default-fullname'
                                    >Title</label>
                                    <input
                                        type='text'
                                        class='form-control title input-field '
                                        id='title-store'
                                        placeholder='Input Title'
                                        name='status' data-require='Mời nhập trạng thái'
                                    />
                                </div>
                                <div class="modal-footer">
                                    <button type='submit' class='btn btn-success fw-semibold text-dark'>Thêm mới</button>
                                    <button type="button" class="btn btn-secondary fw-semibold" data-bs-dismiss="modal">Đóng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Status</th>
                        <th>Create Time</th>
                        <th>Update Time</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($statuses as $status)
                        <tr data-id="{{$status->id}}" class="text-center">
                            <td>{{$status->id}}</td>
                            <td>{{$status->status}}</td>
                            <td>{{$status->created_at}}</td>
                            <td>{{$status->updated_at}}</td>
                            <td class="">
                                <button type="button" data-id="{{$status->id}}" class="btn btn-edit btn-info btnEditStatus text-dark px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#editStatus{{$status->id}}">Sửa</button>
                            </td>
                        </tr>

                        <!-- Modal Edit -->

                    @endforeach
                    </tbody>
                </table>
                @foreach($statuses as $status)
                    <div class="modal fade" id="editStatus{{$status->id}}" tabindex="-1" aria-labelledby="editStatus{{$status->id}}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="createStatusLabel">Chỉnh sửa trạng thái.</h1>
                                </div>
                                <div class="card-body">
                                    <div class="error">
                                        @include('admin.error')
                                    </div>
                                    <form class="form_status_update form-edit" id="form_status_update-{{$status->id}}" data-id="{{$status->id}}" method='post' action='{{ route('statuses.update',['status' => $status]) }}'>
                                        @method('PATCH')
                                        @csrf
                                        <div class='mb-3'>
                                            <label
                                                class='form-label'
                                                for='basic-default-fullname'
                                            >Title</label>
                                            <input
                                                type='text'
                                                class='form-control title input-field'
                                                id='title-edit-{{$status->id}}'
                                                placeholder='Input Title'
                                                name='status' data-require='Mời nhập trạng thái'
                                                value="{{$status->status}}"
                                            />
                                        </div>
                                        <div class="modal-footer">
                                            <button type='submit' class='btn btn-success fw-semibold text-dark'>Cập nhật</button>
                                            <button type="button" class="btn btn-secondary fw-semibold" data-bs-dismiss="modal">Đóng</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

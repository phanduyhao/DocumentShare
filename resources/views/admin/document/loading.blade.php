@extends('admin.main')
@section('contents')
    <div class="container-fluid flex-grow-1 container-p-y">
        <h3 class="fw-bold text-primary py-3 mb-4">{{$title}}</h3>
        <div class="card">
            <div class="d-flex p-4 justify-content-between">
                <h5 class=" fw-bold">Danh sách chờ duyệt</h5>
                <button type="button"class="btn btn-danger me-2 px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#deleteModalAll">Xóa tất cả</button>
                <div class="modal fade" id="deleteModalAll" tabindex="-1" aria-labelledby="deleteModalAllLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModalLabel">Bạn có chắc chắn xóa tất cả bản ghi không ?</h1>
                            </div>
                            <form action="{{route('deleteAllLoad')}}" method="post" class="modal-footer">
                                @csrf
                                <button class="delete-forever btn btn-danger fw-bolder">Xóa</button>
                                <button type="button" class="btn btn-secondary fw-bolder" data-bs-dismiss="modal">Đóng</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Title</th>
                        <th>File</th>
                        <th>Type</th>
                        <th>Size</th>
                        <th>Category</th>
                        <th>Tag</th>
                        <th>Score</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($documents as $document)
                        <tr data-id="{{$document->id}}">
                            <td> {{ $loop->iteration }}</td>
                            <td>{{$document->title}}</td>
                            <td style="width: 250px">
                                <p class="position-relative mb-0" style="width: max-content">
                                    <iframe src="/temp/files/{{$document->file }}" width="220px"></iframe>
                                    <a class="position-absolute start-0 btn-show__details-file top-0 bottom-0 end-0" target="_blank" href="{{ route('documents.show', ['slug' => $document->slug]) }}"></a>
                                </p>
                            </td>
                            <td>{{$document->type}}</td>
                            <td>{{$document->size}}</td>
                            <td>
                                @if($document->cate_id != null)
                                    {{$document->Category->title}}
                                @else
                                    Chưa chọn danh mục
                                @endif
                            </td>
                            <td>
                                @if($document->tag_id != null)
                                    {{$document->Tag->tag_name}}
                                @else
                                    Chưa có thẻ tag
                                @endif
                            </td>
                            <td>{{$document->score}}</td>
                            <td class="">
                                <div class="d-flex align-items-center">
                                    <i class='bx bx-loader-circle fs-2 fw-bold text-warning'></i>
                                    <h5 class="info-details ms-4 mb-0 text-warning">{{$document->Status->status}}</h5>
                                </div>
                            </td>
                            <td class="text-center">
                                <button style="width: 85px" type="button" data-url="/admin/documents/{{$document->id}}" data-id="{{$document->id}}" class="btn btn-danger btnDeleteAsk mb-2 px-2 py-1 fw-bold" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>
                                <form enctype="multipart/form-data" class="form_document_update form-edit mb-2" id="form_document_update-{{$document->id}}" data-id="{{$document->id}}" method='post' action='{{ route('documents.ok',['document' => $document]) }}'>
                                    @method('Patch')
                                    @csrf
                                    <button style="width: 85px" type='submit' class='btn btn-success fw-bold text-dark'>Duyệt</button>
                                </form>
                                <form enctype="multipart/form-data" class="form_document_update form-edit" id="form_document_update-{{$document->id}}" data-id="{{$document->id}}" method='post' action='{{ route('documents.cancelAction',['document' => $document]) }}'>
                                    @method('Patch')
                                    @csrf
                                    <button style="width: 85px" type='submit' class='btn btn-warning fw-bold text-dark'>Hủy</button>
                                </form>
                            </td>

                            <!-- Modal Delete -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteModalLabel">Bạn có chắc chắn xóa bản ghi này vĩnh viễn không ?</h1>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="delete-forever btn btn-danger" data-id="{{ $document->id }}">Xóa</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>

                        <!-- Modal Edit -->

                    @endforeach
                    </tbody>
                </table>
                <div class="pagination mt-4 pb-4">
                    {{ $documents->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

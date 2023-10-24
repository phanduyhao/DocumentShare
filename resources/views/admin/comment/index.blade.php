@extends('admin.main')
@section('contents')
    @extends('admin.main')
@section('contents')
    <div class="container-fluid flex-grow-1 container-p-y">
        <h3 class="fw-bold text-primary py-3 mb-4">{{$title}}</h3>
        <div class="card">
            <div class="d-flex p-4 justify-content-between">
                <h5 class=" fw-bold">Danh sách comments</h5>
                <div>
                    <button type="button" data-id="" class="btn btn-success text-dark px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#createComment">Thêm mới</button>
                    <button type="button"class="btn btn-danger me-2 px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#deleteModalAll">Xóa tất cả</button>
                    <div class="modal fade" id="deleteModalAll" tabindex="-1" aria-labelledby="deleteModalAllLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteModalLabel">Bạn có chắc chắn xóa tất cả comments không ?</h1>
                                </div>
                                <form action="{{route('deleteAllComment')}}" method="post" class="modal-footer">
                                    @csrf
                                    <button class="delete-forever btn btn-danger fw-bolder">Xóa</button>
                                    <button type="button" class="btn btn-secondary fw-bolder" data-bs-dismiss="modal">Đóng</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="createComment" tabindex="-1" aria-labelledby="createCommentLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="createCommentLabel">Thêm mới Comment.</h1>
                        </div>
                        <div class="card-body">
                            <div class="error">
                                @include('admin.error')
                            </div>
                            <form id="form_comment_store" class="form-create" method='POST' action='{{route('comments.store')}}' enctype="multipart/form-data">
                                @csrf
                                <div class='mb-3'>
                                    <label
                                        class='form-label'
                                        for='basic-default-fullname'
                                    >Comment</label>
                                    <input
                                        type='comment'
                                        class='form-control title input-field'
                                        id='comment-store'
                                        name='comment' data-require='Mời chọn comment'
                                    />
                                </div>
                                <div class="form-group mb-3">
                                    <label class='form-label'
                                           for='basic-default-email'>Document</label>
                                    <select name="document_id" class="form-control" id="document_id">
                                        <option value="">Chọn tài liệu</option>
                                        @foreach($documents as $document)
                                            <option value="{{ $document->id }}">{{ $document->id }}-{{ $document->title }}</option>
                                        @endforeach
                                    </select>
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
                <table class="table text-center">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Comment</th>
                        <th>Document</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($comments as $comment)
                        <tr data-id="{{$comment->id}}">
                            <td> {{ $loop->iteration }}</td>
                            <td>{{$comment->id}}</td>
                            <td style="width: 250px">
                                <p class="position-relative mb-0" style="width: max-content">
                                    <iframe src="{{ asset('storage/comments/'. $comment->comment) }}" width="220px"></iframe>
                                    <a class="position-absolute start-0 btn-show__details-comment top-0 bottom-0 end-0" target="_blank" href="{{ asset('storage/comments/'. $comment->comment) }}"></a>
                                </p>
                            </td>
                            <td>
                                @if($comment->document_id == null)
                                    0
                                @else
                                    {{$comment->Document->tag_name}}
                                @endif
                            </td>
                            <td class="">
                                <button type="button" data-url="/admin/comments/{{$comment->id}}" data-id="{{$comment->id}}" class="btn btn-danger btnDeleteAsk me-2 px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>
                                <button type="button" data-id="{{$comment->id}}" class="btn btn-edit btn-info btnEditComment text-dark px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#editComment{{$comment->id}}">Sửa</button>
                            </td>
                            <!-- Modal Delete -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteModalLabel">Bạn có chắc chắn xóa bản ghi này vĩnh viễn không ?</h1>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="delete-forever btn btn-danger" data-id="{{ $comment->id }}">Xóa</button>
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
                @foreach($comments as $comment)
                    <div class="modal fade" id="editComment{{$comment->id}}" tabindex="-1" aria-labelledby="editComment{{$comment->id}}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="createCommentLabel">Chỉnh sửa Comment.</h1>
                                </div>
                                <div class="card-body">
                                    <div class="error">
                                        @include('admin.error')
                                    </div>
                                    <form class="form_comment_update form-edit" id="form_comment_update-{{$comment->id}}" data-id="{{$comment->id}}" method='post' action='{{ route('comments.update',['comment' => $comment]) }}' enctype="multipart/form-data">
                                        @method('Patch')
                                        @csrf
                                        <div class='mb-3'>
                                            <label
                                                class='form-label'
                                                for='basic-default-fullname'
                                            >Comment</label>
                                            <input
                                                type='comment'
                                                class='form-control title input-field'
                                                id='comment-store'
                                                name='comment' data-require='Mời chọn comment'
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label class='form-label'
                                                   for='basic-default-email'>Document</label>
                                            <select name="document" class="form-control" id="document">
                                                @if($comment->document_id != null)
                                                    <option value="{{ $comment->Document->id }}">{{ $comment->Document->id }}-{{ $comment->Document->title }}</option>
                                                @else
                                                    <option value="">Chọn thẻ tag</option>
                                                @endif
                                                @foreach($documents as $document)
                                                    <option value="{{ $document->id }}">{{ $document->id }}-{{ $document->title }}</option>
                                                @endforeach
                                            </select>
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
                <div class="pagination mt-4 pb-4">
                    {{ $comments->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@endsection

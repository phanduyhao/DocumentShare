@extends('admin.main')
@section('contents')
    <div class="container-fluid flex-grow-1 container-p-y">
        <h3 class="fw-bold text-primary py-3 mb-4">{{$title}}</h3>
        <div class="card">
            <div class="d-flex p-4 justify-content-between">
                <h5 class=" fw-bold">Danh sách danh mục</h5>
                <div>
                    <button type="button" data-id="" class="btn btn-success text-dark px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#createTag">Thêm mới</button>
                    <button type="button"class="btn btn-danger me-2 px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#deleteModalAll">Xóa tất cả</button>
                    <div class="modal fade" id="deleteModalAll" tabindex="-1" aria-labelledby="deleteModalAllLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteModalLabel">Bạn có chắc chắn xóa tất cả bản ghi không ?</h1>
                                </div>
                                <form action="{{route('deleteAllTag')}}" method="post" class="modal-footer">
                                    @csrf
                                    <button class="delete-forever btn btn-danger fw-bolder">Xóa</button>
                                    <button type="button" class="btn btn-secondary fw-bolder" data-bs-dismiss="modal">Đóng</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="createTag" tabindex="-1" aria-labelledby="createTagLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="createTagLabel">Thêm mới danh mục.</h1>
                        </div>
                        <div class="card-body">
                            <div class="error">
                                @include('admin.error')
                            </div>
                            <form id="form_tag_store" class="form-create" method='POST' action='{{route('tags.store')}}'>
                                @csrf
                                <div class='mb-3'>
                                    <label
                                        class='form-label'
                                        for='basic-default-fullname'
                                    >Title</label>
                                    <input
                                        type='text'
                                        class='form-control title input-field '
                                        id='tag_name-store'
                                        placeholder='Input Tag Name'
                                        name='tag_name' data-require='Mời nhập tiêu đề'
                                    />
                                </div>
                                <div class="form-group mb-3">
                                    <label class='form-label'
                                           for='basic-default-email'>Tài liệu</label>
                                    <select name="document_id" class="form-control" id="tag">
                                        <option value="">Chọn tài liệu</option>
                                        @foreach($documents as $document)
                                            <option value="{{ $document->id }}">{{ $document->id }}-{{ $document->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label class='form-label'
                                           for='basic-default-email'>Danh mục tài liệu</label>
                                    <select name="cate_id" class="form-control" id="tag">
                                        <option value="">Chọn danh mục tài liệu</option>
                                        @foreach($cates as $cate)
                                            <option value="{{ $cate->id }}">{{ $cate->id }}-{{ $cate->title }}</option>
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
                <table class="table">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Tag Name</th>
                        <th>Category</th>
                        <th>Document</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($tags as $tag)
                        <tr data-id="{{$tag->id}}">
                            <td> {{ $loop->iteration }}</td>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->tag_name}}</td>
                            <td>{{$tag->Category->title}}</td>
                            <td>
                                @if($tag->Document->title == null)
                                    null
                                @else
                                    {{$tag->Document->title}}
                                @endif
                            </td>
                            <td >
                                <button type="button" data-url="/admin/tags/{{$tag->id}}" data-id="{{$tag->id}}" class="btn btn-danger btnDeleteAsk me-2 px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>
                                <button type="button" data-id="{{$tag->id}}" class="btn btn-edit btn-info btnEditTag text-dark px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#editTag{{$tag->id}}">Sửa</button>
                            </td>

                            <!-- Modal Delete -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteModalLabel">Bạn có chắc chắn xóa bản ghi này vĩnh viễn không ?</h1>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="delete-forever btn btn-danger" data-id="{{ $tag->id }}">Xóa</button>
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
                @foreach($tags as $tag)
                    <div class="modal fade" id="editTag{{$tag->id}}" tabindex="-1" aria-labelledby="editTag{{$tag->id}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="createTagLabel">Chỉnh sửa danh mục.</h1>
                            </div>
                            <div class="card-body">
                                <div class="error">
                                    @include('admin.error')
                                </div>
                                <form class="form_tag_update form-edit" id="form_tag_update-{{$tag->id}}" data-id="{{$tag->id}}" method='post' action='{{ route('tags.update',['tag' => $tag]) }}'>
                                    @method('Patch')
                                    @csrf
                                    <div class='mb-3'>
                                        <label
                                            class='form-label'
                                            for='basic-default-fullname'
                                        >Title</label>
                                        <input
                                            type='text'
                                            class='form-control title input-field '
                                            id='tag_name-store-{{$tag->id}}'
                                            placeholder='Input Tag Name'
                                            value="{{$tag->tag_name}}"
                                            name='tag_name' data-require='Mời nhập tiêu đề'
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class='form-label'
                                               for='basic-default-email'>Tài liệu</label>
                                        <select name="document_id" class="form-control" id="tag">
                                            @if($tag->document_id != null)
                                                <option value="{{ $tag->Document->id }}">{{ $tag->Document->id }}-{{ $tag->Document->title }}</option>
                                            @else
                                                <option value="">Chọn tài liệu</option>
                                            @endif
                                            @foreach($documents as $document)
                                                <option value="{{ $document->id }}">{{ $document->id }}-{{ $document->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group ">
                                        <label class='form-label'
                                               for='basic-default-email'>Danh mục tài liệu</label>
                                        <select name="cate_id" class="form-control" id="tag">
                                            @if($tag->cate_id != null)
                                                <option value="{{ $tag->Category->id }}">{{ $tag->Category->id }}-{{ $tag->Category->title }}</option>
                                            @else
                                                <option value="">Chọn tài liệu</option>
                                            @endif
                                            @foreach($cates as $cate)
                                                <option value="{{ $cate->id }}">{{ $cate->id }}-{{ $cate->title }}</option>
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
                    {{ $tags->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

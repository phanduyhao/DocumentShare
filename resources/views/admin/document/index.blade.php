@extends('admin.main')
@section('contents')
    <div class="container-fluid flex-grow-1 container-p-y">
        <h3 class="fw-bold text-primary py-3 mb-4">{{$title}}</h3>
        <div class="card">
            <div class="d-flex p-4 justify-content-between">
                <h5 class=" fw-bold">Danh sách tài liệu</h5>
                <button type="button" data-id="" class="btn btn-success text-dark px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#createDocument">Thêm mới</button>
            </div>
            <div class="modal fade" id="createDocument" tabindex="-1" aria-labelledby="createDocumentLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="createDocumentLabel">Thêm mới tài liệu.</h1>
                        </div>
                        <div class="card-body">
                            <div class="error">
                                @include('admin.error')
                            </div>
                            <form id="form_document_store" class="form-create" method='POST' action='{{route('documents.store')}}' enctype="multipart/form-data">
                                @csrf
                                <div class='mb-3'>
                                    <label
                                        class='form-label'
                                        for='basic-default-fullname'
                                    >File</label>
                                    <input
                                        type='file'
                                        class='form-control title input-field'
                                        id='file-store'
                                        name='file' data-require='Mời chọn file'
                                    />
                                </div>
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
                                        name='title' data-require='Mời nhập Tiêu đề'
                                    />
                                </div>
                                <div class='mb-3'>
                                    <label
                                        class='form-label'
                                        for='basic-default-company'
                                    >Slug</label>
                                    <input
                                        type='text'
                                        class='form-control slug input-field'
                                        id='slug-store'
                                        placeholder='Input Slug'
                                        name='slug' data-require='Mời nhập Slug'
                                    />
                                </div>
                                <div class='mb-3'>
                                    <label
                                        class='form-label'
                                        for='basic-default-email'
                                    >Description</label>
                                    <div class='input-group input-group-merge'>
                                        <input
                                            type='text'
                                            id='desc'
                                            class='form-control'
                                            placeholder='Input Description'
                                            name='desc'
                                        />
                                    </div>
                                </div>
                                <div class='mb-3'>
                                    <label
                                        class='form-label'
                                        for='basic-default-email'
                                    >Source</label>
                                    <div class='input-group input-group-merge'>
                                        <input
                                            type='number'
                                            id='Source'
                                            class='form-control'
                                            placeholder='Input Source'
                                            name='Source'
                                        />
                                    </div>
                                </div>
                                <div class='mb-3'>
                                    <label
                                        class='form-label'
                                        for='basic-default-email'
                                    >Score</label>
                                    <div class='input-group input-group-merge'>
                                        <input
                                            type='number'
                                            id='score'
                                            class='form-control'
                                            placeholder='Input score'
                                            name='score'
                                        />
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class='form-label'
                                           for='basic-default-email'>Cate Id</label>
                                    <select name="cate_id" class="form-control" id="cate_id">
                                        <option value="">Chọn danh mục</option>
                                        @foreach($cates as $cate)
                                            <option value="{{ $cate->id }}">{{ $cate->id }}-{{ $cate->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class='form-label'
                                           for='basic-default-email'>Tag</label>
                                    <select name="tag" class="form-control" id="tag">
                                        <option value="">Chọn danh mục cha</option>
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
                <table class="table">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Title</th>
                        <th>Cate ID</th>
                        <th>Tag ID</th>
                        <th>Status</th>
                        <th>Score</th>
                        <th>Type</th>
                        <th>Source</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($documents as $document)
                        <tr data-id="{{$document->id}}">
                            <td> {{ $loop->iteration }}</td>
                            <td>{{$document->title}}</td>
                            <td>
                                <iframe src="https://docs.google.com/viewerng/viewer?url={{asset('storage/files/' . $document->file)}}" width="100%" height="500px" frameborder="0"></iframe>
                            </td>
                            <td>{{$document->cate_id}}</td>
                            <td>{{$document->tag_id}}</td>
                            <td>{{$document->score}}</td>
                            <td>{{$document->type}}</td>
                            <td>{{$document->source}}</td>
                            <td class="d-flex justify-content-between">
                                <button type="button" data-url="/admin/documents/{{$document->id}}" data-id="{{$document->id}}" class="btn btn-danger btnDeleteAsk me-2 px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>
                                <button type="button" data-id="{{$document->id}}" class="btn btn-edit btn-info btnEditDocument text-dark px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#editDocument{{$document->id}}">Sửa</button>
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
                @foreach($documents as $document)
                    <div class="modal fade" id="editDocument{{$document->id}}" tabindex="-1" aria-labelledby="editDocument{{$document->id}}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="createDocumentLabel">Chỉnh sửa danh mục.</h1>
                                </div>
                                <div class="card-body">
                                    <div class="error">
                                        @include('admin.error')
                                    </div>
                                    <form class="form_document_update form-edit" id="form_document_update-{{$document->id}}" data-id="{{$document->id}}" method='post' action='{{ route('documents.update',['document' => $document]) }}'>
                                        @method('Patch')
                                        @csrf
                                        <div class='mb-3'>
                                            <label
                                                class='form-label'
                                                for='basic-default-fullname'
                                            >Title</label>
                                            <input
                                                type='text'
                                                class='form-control title input-field'
                                                id='title-edit-{{$document->id}}'
                                                placeholder='Input Title'
                                                name='title' data-require='Mời nhập Tiêu đề'
                                                value="{{$document->title}}"
                                            />
                                        </div>
                                        <div class='mb-3'>
                                            <label
                                                class='form-label'
                                                for='basic-default-company'
                                            >Slug</label>
                                            <input
                                                type='text'
                                                class='form-control slug input-field'
                                                id='slug-edit-{{$document->id}}'
                                                placeholder='Input Slug'
                                                name='slug' data-require='Mời nhập Slug'
                                                value="{{$document->slug}}"
                                            />
                                        </div>
                                        <div class='mb-3'>
                                            <label
                                                class='form-label'
                                                for='basic-default-email'
                                            >Description</label>
                                            <div class='input-group input-group-merge'>
                                                <input
                                                    type='text'
                                                    id='desc'
                                                    class='form-control'
                                                    placeholder='Input Description'
                                                    name='desc'
                                                    value="{{$document->desc}}"
                                                />
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class='form-label'
                                                   for='basic-default-email'>Parent Id</label>
                                            <select name="cate_id" class="form-control" id="cate_id">
                                                <option value="">Chọn danh mục cha</option>
                                                @foreach($documents as $document)
                                                    <option value="{{ $document->id }}">{{ $document->id }}-{{ $document->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class='form-label'
                                                   for='basic-default-email'>Tag</label>
                                            <select name="tag" class="form-control" id="tag">
                                                <option value="">Chọn danh mục cha</option>
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
                    {{ $documents->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

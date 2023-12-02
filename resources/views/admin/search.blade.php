@extends('admin.main')
@section('contents')
    <div class="container-fluid flex-grow-1 container-p-y">
        <h3 class="fw-bold text-primary py-3 mb-4">{{$title}}</h3>

        <div class="card">
            <div class="d-flex p-4 justify-content-between">
                <h5 class=" fw-bold">Danh sách tài liệu</h5>
                <div>
                    <button type="button" data-id="" class="btn btn-success text-dark px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#createDocument">Thêm mới</button>
                </div>
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
                                        data-count="{{$count_docs}}"
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
                                            type='text'
                                            id='Source'
                                            class='form-control'
                                            placeholder='Input Source'
                                            name='source'
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
                                           for='basic-default-email'>Danh mục</label>
                                    <select name="cate_id" class="form-control" id="cate_id">
                                        <option value="">Chọn danh mục</option>
                                        @foreach($cates as $cate)
                                            <option value="{{ $cate->id }}">{{ $cate->id }}-{{ $cate->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class='form-label'
                                           for='basic-default-email'>Thẻ Tag</label>
                                    <select name="tag" class="form-control" id="tag">
                                        <option value="">Chọn thẻ tag</option>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->id }}-{{ $tag->tag_name }}</option>
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

            <div class="tab-pane fade show active" id="pills-doc-normal" role="tabpanel" aria-labelledby="pills-doc-normal-tab" tabindex="0">
                <div class="table-responsive">
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
                            @foreach($searchResults as $searchResult)
                                <tr data-id="{{$searchResult->id}}">
                                    <td> {{ $loop->iteration }}</td>
                                    <td>{{$searchResult->title}}</td>
                                    <td>
                                        <p class="position-relative mb-0" style="width: max-content">
                                            <iframe src="/temp/files/{{$searchResult->file }}" width="220px"></iframe>
                                            <a data-id="{{$searchResult->id}}" class="position-absolute start-0 top-0 bottom-0 end-0" target="_blank" href="{{ route('documents.show', ['slug' =>$searchResult->slug]) }}">
                                            </a>

                                        </p>
                                    </td>
                                    <td>{{$searchResult->type}}</td>
                                    <td>{{$searchResult->size}}</td>
                                    <td>
                                        @if($searchResult->cate_id != null)
                                            {{$searchResult->Category->title}}
                                        @else
                                            Chưa chọn danh mục
                                        @endif
                                    </td>
                                    <td>
                                        @if($searchResult->tag_id != null)
                                            {{$searchResult->Tag->tag_name}}
                                        @else
                                            Chưa có thẻ tag
                                        @endif
                                    </td>
                                    <td>{{$searchResult->score}}</td>
                                    <td class="">
                                        <div class="d-flex align-items-center">
                                            <i class='bx bx-check fs-2 fw-bold text-success'></i>
                                            <h5 class="info-details ms-4 mb-0 text-success">{{$searchResult->Status->status}}</h5>
                                        </div>
                                    </td>
                                    <td class="text-nowrap">
                                        <button type="button" data-url="/admin/documents/{{$searchResult->id}}" data-id="{{$searchResult->id}}" class="btn btn-danger btnDeleteAsk me-2 px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>
                                        <button type="button" data-id="{{$searchResult->id}}" class="btn btn-edit btn-info btnEditDocument text-dark me-2 px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#editDocument{{$searchResult->id}}">Sửa</button>
                                    </td>

                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="deleteModalLabel">Bạn có chắc chắn xóa bản ghi này vĩnh viễn không ?</h1>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="delete-forever btn btn-danger" data-id="{{ $searchResult->id }}">Xóa</button>
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
                        @foreach($searchResults as $searchResult)
                            <div class="modal fade" id="editDocument{{$searchResult->id}}" tabindex="-1" aria-labelledby="editDocument{{$searchResult->id}}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="createDocumentLabel">Chỉnh sửa tài liệu.</h1>
                                        </div>
                                        <div class="card-body">
                                            <div class="error">
                                                @include('admin.error')
                                            </div>
                                            <form enctype="multipart/form-data" class="form_document_update form-edit" id="form_document_update-{{$searchResult->id}}" data-id="{{$searchResult->id}}" method='post' action='{{ route('documents.update',['document' => $searchResult]) }}'>
                                                @method('Patch')
                                                @csrf
                                                <div class='mb-3'>
                                                    <label
                                                        class='form-label'
                                                        for='basic-default-fullname'
                                                    >File</label>
                                                    <input
                                                        type='file'
                                                        class='form-control file'
                                                        id='file-store-{{$searchResult->id}}'
                                                        name='file'
                                                    />
                                                </div>
                                                <div class='mb-3'>
                                                    <label
                                                        class='form-label'
                                                        for='basic-default-fullname'
                                                    >Title</label>
                                                    <input
                                                        data-count="{{$count_docs}}"
                                                        type='text'
                                                        class='form-control title input-field '
                                                        id='title-store-{{$searchResult->id}}'
                                                        placeholder='Input Title'
                                                        name='title' data-require='Mời nhập Tiêu đề'
                                                        value="{{$searchResult->title}}"
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
                                                        id='slug-store-{{$searchResult->id}}'
                                                        placeholder='Input Slug'
                                                        name='slug' data-require='Mời nhập Slug'
                                                        value="{{$searchResult->slug}}"
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
                                                            id='desc-{{$searchResult->id}}'
                                                            class='form-control'
                                                            placeholder='Input Description'
                                                            name='desc'
                                                            value="{{$searchResult->description}}"
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
                                                            type='text'
                                                            id='Source-{{$searchResult->id}}'
                                                            class='form-control'
                                                            placeholder='Input Source'
                                                            name='source'
                                                            value="{{$searchResult->source}}"
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
                                                            id='score-{{$searchResult->id}}'
                                                            class='form-control'
                                                            placeholder='Input score'
                                                            name='score'
                                                            value="{{$searchResult->score}}"
                                                        />
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class='form-label'
                                                           for='basic-default-email'>Danh mục</label>
                                                    <select name="cate_id" class="form-control" id="cate_id-{{$searchResult->id}}">
                                                        @if($searchResult->cate_id != null)
                                                            <option value="{{ $searchResult->Category->id }}">{{ $searchResult->Category->id }}-{{ $searchResult->Category->title }}</option>
                                                        @else
                                                            <option value="">Chọn danh mục</option>
                                                        @endif
                                                        @foreach($cates as $cate)
                                                            <option value="{{ $cate->id }}">{{ $cate->id }}-{{ $cate->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class='form-label'
                                                           for='basic-default-email'>Thẻ Tag</label>
                                                    <select name="tag_id" class="form-control" id="tag-{{$searchResult->id}}">
                                                        @if($searchResult->tag_id != null)
                                                            <option value="{{ $searchResult->Tag->id }}">{{ $searchResult->Tag->id }}-{{ $searchResult->Tag->tag_name }}</option>
                                                        @else
                                                            <option value="">Chọn thẻ tag</option>
                                                        @endif
                                                        @foreach($tags as $tag)
                                                            <option value="{{ $tag }}">{{ $tag }}-{{ $tag->tag_name }}</option>
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
                    </div>

        </div>
    </div>
@endsection

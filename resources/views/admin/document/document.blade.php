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
            @foreach($documents as $document)
                <tr data-id="{{$document->id}}">
                    <td> {{ $loop->iteration }}</td>
                    <td>{{$document->title}}</td>
                    <td>
                        <p class="position-relative mb-0" style="width: max-content">
                            <iframe src="/temp/files/{{$document->file }}" width="220px"></iframe>
                            <a data-id="{{$document->id}}" class="position-absolute start-0 top-0 bottom-0 end-0" target="_blank" href="{{ route('documents.show', ['slug' =>$document->slug]) }}">
                            </a>

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
                            <i class='bx bx-check fs-2 fw-bold text-success'></i>
                            <h5 class="info-details ms-4 mb-0 text-success">{{$document->Status->status}}</h5>
                        </div>
                    </td>
                    <td class="text-nowrap">
                        <button type="button" data-url="/admin/documents/{{$document->id}}" data-id="{{$document->id}}" class="btn btn-danger btnDeleteAsk me-2 px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>
                        <button type="button" data-id="{{$document->id}}" class="btn btn-edit btn-info btnEditDocument text-dark me-2 px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#editDocument{{$document->id}}">Sửa</button>

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
                            <h1 class="modal-title fs-5" id="createDocumentLabel">Chỉnh sửa tài liệu.</h1>
                        </div>
                        <div class="card-body">
                            <div class="error">
                                @include('admin.error')
                            </div>
                            <form enctype="multipart/form-data" class="form_document_update form-edit" id="form_document_update-{{$document->id}}" data-id="{{$document->id}}" method='post' action='{{ route('documents.update',['document' => $document]) }}'>
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
                                        id='file-store-{{$document->id}}'
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
                                        id='title-store-{{$document->id}}'
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
                                        id='slug-store-{{$document->id}}'
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
                                            id='desc-{{$document->id}}'
                                            class='form-control'
                                            placeholder='Input Description'
                                            name='desc'
                                            value="{{$document->description}}"
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
                                            id='Source-{{$document->id}}'
                                            class='form-control'
                                            placeholder='Input Source'
                                            name='source'
                                            value="{{$document->source}}"
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
                                            id='score-{{$document->id}}'
                                            class='form-control'
                                            placeholder='Input score'
                                            name='score'
                                            value="{{$document->score}}"
                                        />
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class='form-label'
                                           for='basic-default-email'>Danh mục</label>
                                    <select name="cate_id" class="form-control" id="cate_id-{{$document->id}}">
                                        @if($document->cate_id != null)
                                            <option value="{{ $document->Category->id }}">{{ $document->Category->id }}-{{ $document->Category->title }}</option>
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
                                    <select name="tag_id" class="form-control" id="tag-{{$document->id}}">
                                        @if($document->tag_id != null)
                                            <option value="{{ $document->Tag->id }}">{{ $document->Tag->id }}-{{ $document->Tag->tag_name }}</option>
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
        @include('component.paginate',['docs'=>$documents])
    </div>
</div>
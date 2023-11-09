@extends('admin.main')
@section('contents')
    <div class="container-fluid flex-grow-1 container-p-y">
        <h3 class="fw-bold text-primary py-3 mb-4">{{$title}}</h3>





        <div class="card">
            <div class="d-flex p-4 justify-content-between">
                <h5 class=" fw-bold">Danh sách tài liệu</h5>
               <div>
                   <button type="button" data-id="" class="btn btn-success text-dark px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#createDocument">Thêm mới</button>
                   <button type="button"class="btn btn-danger me-2 px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#deleteModalAll">Xóa tất cả</button>
                   <div class="modal fade" id="deleteModalAll" tabindex="-1" aria-labelledby="deleteModalAllLabel" aria-hidden="true">
                       <div class="modal-dialog">
                           <div class="modal-content">
                               <div class="modal-header">
                                   <h1 class="modal-title fs-5" id="deleteModalLabel">Bạn có chắc chắn xóa tất cả bản ghi không ?</h1>
                               </div>
                               <form action="{{route('deleteAllOk')}}" method="post" class="modal-footer">
                                   @csrf
                                   <button class="delete-forever btn btn-danger fw-bolder">Xóa</button>
                                   <button type="button" class="btn btn-secondary fw-bolder" data-bs-dismiss="modal">Đóng</button>
                               </form>
                           </div>
                       </div>
                   </div>
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
                                            <option value="{{ $tag->id }}">{{ $tag->id }}-{{ $tag->title }}</option>
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
            <ul class="nav nav-pills mb-3 justify-content-center bg-white py-3 rounded-2" id="pills-tab" role="tablist">
                <li class="nav-item me-3" role="presentation">
                    <button class="nav-link active fw-bold" id="pills-doc-normal-tab" data-bs-toggle="pill" data-bs-target="#pills-doc-normal" type="button" role="tab" aria-controls="pills-doc-normal" aria-selected="true" style="width: 150px">Tài liệu thường</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bold" id="pills-doc-vip-tab" data-bs-toggle="pill" data-bs-target="#pills-doc-vip" type="button" role="tab" aria-controls="pills-doc-vip" aria-selected="false" style="width: 150px">Tài liệu Vip</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
{{--                Tài liệu thường             --}}
                <div class="tab-pane fade show active" id="pills-doc-normal" role="tabpanel" aria-labelledby="pills-doc-normal-tab" tabindex="0">
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
<<<<<<< HEAD
                                            <iframe src="/temp/files/{{$document->file }}" width="220px"></iframe>
=======
                                            <iframe src="{{ asset('storage/files/'. $document->file) }}" width="220px"></iframe>
>>>>>>> f2c7389ac3cb13c8ba21f3c2ee2c19c43e10fea7
                                            <a data-id="{{$document->id}}" class="position-absolute start-0 btn-show__details-file top-0 bottom-0 end-0" target="_blank" href="{{ route('documents.show', ['slug' =>$document->slug]) }}">
                                                <a href="" data-id="{{$document->id}}" class="position-absolute end-0 z-3 me-3 btn-favourite">
                                                    <i class='bx bxs-heart fs-3 icon-favourite' ></i>
                                                </a>
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
                                    <td class="">
                                        <button type="button" data-url="/admin/documents/{{$document->id}}" data-id="{{$document->id}}" class="btn btn-danger btnDeleteAsk me-2 px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>
                                        <button type="button" data-id="{{$document->id}}" class="btn btn-edit btn-info btnEditDocument text-dark me-2 px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#editDocument{{$document->id}}">Sửa</button>
<<<<<<< HEAD
                                        <a data-id="{{$document->id}}" data-score-doc="{{$document->score}}" data-score-user="{{ Auth::user()->score }}" data-user-id="{{ Auth::id() }}" href="/temp/filesOrigin/{{$document->file }}.{{$document->type}}" download class="download-file">
=======
                                        <a data-id="{{$document->id}}" data-score-doc="{{$document->score}}" data-score-user="{{ Auth::user()->score }}" data-user-id="{{ Auth::id() }}" href="{{ asset('storage/filesOrigin/'. $document->file .'.'. $document->type) }}" download class="download-file">
>>>>>>> f2c7389ac3cb13c8ba21f3c2ee2c19c43e10fea7
                                            <i class='bx bxs-downvote fs-3' ></i>
                                        </a>
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
                                                            type='number'
                                                            id='Source-{{$document->id}}'
                                                            class='form-control'
                                                            placeholder='Input Source'
                                                            name='Source'
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
                                                            <option value="{{ $tag->id }}">{{ $tag->id }}-{{ $tag->tag_name }}</option>
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
<<<<<<< HEAD

=======
                
>>>>>>> f2c7389ac3cb13c8ba21f3c2ee2c19c43e10fea7
{{--                Tài liệu Vip                --}}
                <div class="tab-pane fade" id="pills-doc-vip" role="tabpanel" aria-labelledby="pills-doc-vip-tab" tabindex="0">
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
                            @foreach($document_vips as $document_vip)
                                <tr data-id="{{$document_vip->id}}">
                                    <td> {{ $loop->iteration }}</td>
                                    <td>{{$document_vip->title}}</td>
                                    <td style="width: 250px">
                                        <p class="position-relative mb-0" style="width: max-content">
<<<<<<< HEAD
                                            <iframe src="/temp/files/{{$document_vip->file }}" width="220px"></iframe>
                                            <a data-id="{{$document_vip->id}}" class="position-absolute start-0 btn-show__details-file top-0 bottom-0 end-0" target="_blank" href="/temp/filesOrigin/{{$document_vip->file }}.{{$document_vip->type}}">
=======
                                            <iframe src="{{ asset('storage/files/'. $document_vip->file) }}" width="220px"></iframe>
                                            <a data-id="{{$document_vip->id}}" class="position-absolute start-0 btn-show__details-file top-0 bottom-0 end-0" target="_blank" href="{{ route('documents.show', ['slug' =>$document_vip->slug]) }}">
>>>>>>> f2c7389ac3cb13c8ba21f3c2ee2c19c43e10fea7
                                                <a href="" data-id="{{$document_vip->id}}" class="position-absolute end-0 z-3 me-3 btn-favourite">
                                                    <i class='bx bxs-heart fs-3 icon-favourite' ></i>
                                                </a>
                                            </a>

                                        </p>
                                    </td>
                                    <td>{{$document_vip->type}}</td>
                                    <td>{{$document_vip->size}}</td>
                                    <td>
                                        @if($document_vip->cate_id != null)
                                            {{$document_vip->Category->title}}
                                        @else
                                            Chưa chọn danh mục
                                        @endif
                                    </td>
                                    <td>
                                        @if($document_vip->tag_id != null)
                                            {{$document_vip->Tag->tag_name}}
                                        @else
                                            Chưa có thẻ tag
                                        @endif
                                    </td>
                                    <td>{{$document_vip->score}}</td>
                                    <td class="">
                                        <div class="d-flex align-items-center">
                                            <i class='bx bx-check fs-2 fw-bold text-success'></i>
                                            <h5 class="info-details ms-4 mb-0 text-success">{{$document_vip->Status->status}}</h5>
                                        </div>
                                    </td>
                                    <td class="">
                                        <button type="button" data-url="/admin/documents/{{$document_vip->id}}" data-id="{{$document_vip->id}}" class="btn btn-danger btnDeleteAsk me-2 px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>
                                        <button type="button" data-id="{{$document_vip->id}}" class="btn btn-edit btn-info btnEditDocument text-dark me-2 px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#editDocument{{$document_vip->id}}">Sửa</button>
<<<<<<< HEAD
                                        <a data-id="{{$document_vip->id}}" data-score-doc="{{$document_vip->score}}" data-score-user="{{ Auth::user()->score }}" data-user-id="{{ Auth::id() }}" href="/temp/filesOrigin/{{$document_vip->file }}.{{$document_vip->type}}" download class="download-file">
=======
                                        <a data-id="{{$document_vip->id}}" data-score-doc="{{$document_vip->score}}" data-score-user="{{ Auth::user()->score }}" data-user-id="{{ Auth::id() }}" href="{{ asset('storage/filesOrigin/'. $document_vip->file .'.'. $document_vip->type) }}" download class="download-file">
>>>>>>> f2c7389ac3cb13c8ba21f3c2ee2c19c43e10fea7
                                            <i class='bx bxs-downvote fs-3' ></i>
                                        </a>
                                    </td>

                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="deleteModalLabel">Bạn có chắc chắn xóa bản ghi này vĩnh viễn không ?</h1>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="delete-forever btn btn-danger" data-id="{{ $document_vip->id }}">Xóa</button>
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
                        @foreach($document_vips as $document_vip)
                            <div class="modal fade" id="editDocument{{$document_vip->id}}" tabindex="-1" aria-labelledby="editDocument{{$document_vip->id}}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="createDocumentLabel">Chỉnh sửa tài liệu.</h1>
                                        </div>
                                        <div class="card-body">
                                            <div class="error">
                                                @include('admin.error')
                                            </div>
                                            <form enctype="multipart/form-data" class="form_document_update form-edit" id="form_document_update-{{$document_vip->id}}" data-id="{{$document_vip->id}}" method='post' action='{{ route('documents.update',['document' => $document_vip]) }}'>
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
                                                        id='file-store-{{$document_vip->id}}'
                                                        name='file'
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
                                                        id='title-store-{{$document_vip->id}}'
                                                        placeholder='Input Title'
                                                        name='title' data-require='Mời nhập Tiêu đề'
                                                        value="{{$document_vip->title}}"
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
                                                        id='slug-store-{{$document_vip->id}}'
                                                        placeholder='Input Slug'
                                                        name='slug' data-require='Mời nhập Slug'
                                                        value="{{$document_vip->slug}}"
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
                                                            id='desc-{{$document_vip->id}}'
                                                            class='form-control'
                                                            placeholder='Input Description'
                                                            name='desc'
                                                            value="{{$document_vip->description}}"
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
                                                            id='Source-{{$document_vip->id}}'
                                                            class='form-control'
                                                            placeholder='Input Source'
                                                            name='Source'
                                                            value="{{$document_vip->source}}"
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
                                                            id='score-{{$document_vip->id}}'
                                                            class='form-control'
                                                            placeholder='Input score'
                                                            name='score'
                                                            value="{{$document_vip->score}}"
                                                        />
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class='form-label'
                                                           for='basic-default-email'>Danh mục</label>
                                                    <select name="cate_id" class="form-control" id="cate_id-{{$document_vip->id}}">
                                                        @if($document_vip->cate_id != null)
                                                            <option value="{{ $document_vip->Category->id }}">{{ $document_vip->Category->id }}-{{ $document_vip->Category->title }}</option>
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
                                                    <select name="tag_id" class="form-control" id="tag-{{$document_vip->id}}">
                                                        @if($document_vip->tag_id != null)
                                                            <option value="{{ $document_vip->Tag->id }}">{{ $document_vip->Tag->id }}-{{ $document_vip->Tag->tag_name }}</option>
                                                        @else
                                                            <option value="">Chọn thẻ tag</option>
                                                        @endif
                                                        @foreach($tags as $tag)
                                                            <option value="{{ $tag->id }}">{{ $tag->id }}-{{ $tag->tag_name }}</option>
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
                            {{ $document_vips->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

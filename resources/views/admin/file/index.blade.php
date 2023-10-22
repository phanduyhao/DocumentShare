@extends('admin.main')
@section('contents')
    <div class="container-fluid flex-grow-1 container-p-y">
        <h3 class="fw-bold text-primary py-3 mb-4">{{$title}}</h3>
        <div class="card">
            <div class="d-flex p-4 justify-content-between">
                <h5 class=" fw-bold">Danh sách danh mục</h5>
                <div>
                    <button type="button" data-id="" class="btn btn-success text-dark px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#createFile">Thêm mới</button>
                    <button type="button"class="btn btn-danger me-2 px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#deleteModalAll">Xóa tất cả</button>
                    <div class="modal fade" id="deleteModalAll" tabindex="-1" aria-labelledby="deleteModalAllLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteModalLabel">Bạn có chắc chắn xóa tất cả bản ghi không ?</h1>
                                </div>
                                <form action="{{route('deleteAllMenu')}}" method="post" class="modal-footer">
                                    @csrf
                                    <button class="delete-forever btn btn-danger fw-bolder">Xóa</button>
                                    <button type="button" class="btn btn-secondary fw-bolder" data-bs-dismiss="modal">Đóng</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="createFile" tabindex="-1" aria-labelledby="createFileLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="createFileLabel">Thêm mới danh mục.</h1>
                        </div>
                        <div class="card-body">
                            <div class="error">
                                @include('admin.error')
                            </div>
                            <form id="form_file_store" class="form-create" method='POST' action='{{route('files.store')}}'>
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
                                <div class="form-group mb-3">
                                    <label class='form-label'
                                           for='basic-default-email'>Parent Id</label>
                                    <select name="parent_id" class="form-control" id="parent_id">
                                        <option value="">Chọn danh mục cha</option>
                                        @foreach($files as $file)
                                            <option value="{{ $file->id }}">{{ $file->id }}-{{ $file->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class='form-label'
                                           for='basic-default-email'>Tag</label>
                                    <select name="tag" class="form-control" id="tag">
                                        <option value="">Chọn thẻ Tag</option>
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
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Desc</th>
                        <th>Parent_File</th>
                        <th>Tag</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($files as $file)
                        <tr data-id="{{$file->id}}">
                            <td> {{ $loop->iteration }}</td>
                            <td>{{$file->id}}</td>
                            <td>{{$file->title}}</td>
                            <td>{{$file->desc}}</td>
                            <td>
                                @if($file->parent_id == null)
                                    0
                                @else
                                    {{$file->parent->title}}
                                @endif
                            </td>
                            <td>
                                @if($file->tag_id == null)
                                    0
                                @else
                                    {{$file->Tag->tag_name}}
                                @endif
                            </td>
                            <td class="">
                                <button type="button" data-url="/admin/files/{{$file->id}}" data-id="{{$file->id}}" class="btn btn-danger btnDeleteAsk me-2 px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>
                                <button type="button" data-id="{{$file->id}}" class="btn btn-edit btn-info btnEditFile text-dark px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#editFile{{$file->id}}">Sửa</button>
                            </td>
                            <!-- Modal Delete -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteModalLabel">Bạn có chắc chắn xóa bản ghi này vĩnh viễn không ?</h1>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="delete-forever btn btn-danger" data-id="{{ $file->id }}">Xóa</button>
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
                @foreach($files as $file)
                    <div class="modal fade" id="editFile{{$file->id}}" tabindex="-1" aria-labelledby="editFile{{$file->id}}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="createFileLabel">Chỉnh sửa danh mục.</h1>
                                </div>
                                <div class="card-body">
                                    <div class="error">
                                        @include('admin.error')
                                    </div>
                                    <form class="form_file_update form-edit" id="form_file_update-{{$file->id}}" data-id="{{$file->id}}" method='post' action='{{ route('files.update',['file' => $file]) }}'>
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
                                                id='title-edit-{{$file->id}}'
                                                placeholder='Input Title'
                                                name='title' data-require='Mời nhập Tiêu đề'
                                                value="{{$file->title}}"
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
                                                id='slug-edit-{{$file->id}}'
                                                placeholder='Input Slug'
                                                name='slug' data-require='Mời nhập Slug'
                                                value="{{$file->slug}}"
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
                                                    value="{{$file->desc}}"
                                                />
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class='form-label'
                                                   for='basic-default-email'>Parent Id</label>
                                            <select name="parent_id" class="form-control" id="parent_id">
                                                @if($file->parent_id != null)
                                                    <option value="{{ $file->parent->id }}">{{ $file->parent->id }}-{{ $file->parent->title }}</option>
                                                @else
                                                    <option value="">Chọn danh mục cha</option>
                                                @endif
                                                @foreach($files as $file)
                                                    <option value="{{ $file->id }}">{{ $file->id }}-{{ $file->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class='form-label'
                                                   for='basic-default-email'>Tag</label>
                                            <select name="tag" class="form-control" id="tag">
                                                @if($file->tag_id != null)
                                                    <option value="{{ $file->Tag->id }}">{{ $file->Tag->id }}-{{ $file->Tag->tag_name }}</option>
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
                    {{ $files->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

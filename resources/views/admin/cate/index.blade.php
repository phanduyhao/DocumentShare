@extends('admin.main')
@section('contents')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h3 class="fw-bold text-primary py-3 mb-4">{{$title}}</h3>
        <div class="card">
            <div class="d-flex p-4 justify-content-between">
                <h5 class=" fw-bold">Danh sách danh mục</h5>
                <button type="button" data-id="" class="btn btn-success text-dark px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#createCate">Thêm mới</button>
            </div>

            <div class="modal fade" id="createCate" tabindex="-1" aria-labelledby="createCateLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="createCateLabel">Thêm mới danh mục.</h1>
                        </div>
                        <div class="card-body">

                            <form id="form_cate_store" method='POST' action='{{route('cates.store')}}'>
                                @csrf
                                <div class="error">
                                    @include('admin.error')
                                </div>
                                <div class='mb-3'>
                                    <label
                                        class='form-label'
                                        for='basic-default-fullname'
                                    >Title</label>
                                    <input
                                        type='text'
                                        class='form-control title '
                                        id='title-store'
                                        placeholder='Input Title'
                                        name='title'
                                    />
                                </div>
                                <div class='mb-3'>
                                    <label
                                        class='form-label'
                                        for='basic-default-company'
                                    >Slug</label>
                                    <input
                                        type='text'
                                        class='form-control slug'
                                        id='slug-store'
                                        placeholder='Input Slug'
                                        name='slug'
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
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Desc</th>
                        <th>Parent_Id</th>
                        <th>Tag</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($cates as $cate)
                        <tr data-id="{{$cate->id}}">
                            <td> {{ $loop->iteration }}</td>
                            <td>{{$cate->id}}</td>
                            <td>{{$cate->title}}</td>
                            <td>{{$cate->slug}}</td>
                            <td>{{$cate->desc}}</td>
                            <td>
                            @foreach($cate_parents as $cate_parent)
                                @if($cate->parent_id == $cate_parent->id)
                                    {{$cate_parent->id}} - {{$cate_parent->title}}
                                @endif
                            @endforeach
                            </td>
                            <td>{{$cate->tag}}</td>
                            <td class="d-flex justify-content-between">
                                <button type="button" data-url="/admin/cates/{{$cate->id}}" data-id="{{$cate->id}}" class="btn btn-danger btnDeleteAsk px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>
                                <button type="button" data-id="{{$cate->id}}" class="btn btn-info btnEditCate text-dark px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#editCate{{$cate->id}}">Sửa</button>
                            </td>

                            <!-- Modal Delete -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteModalLabel">Bạn có chắc chắn xóa bản ghi này vĩnh viễn không ?</h1>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="delete-forever btn btn-danger" data-id="{{ $cate->id }}">Xóa</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editCate{{$cate->id}}" tabindex="-1" aria-labelledby="editCate{{$cate->id}}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="createCateLabel">Chỉnh sửa danh mục.</h1>
                                    </div>
                                    <div class="card-body">

                                        <form class="form_cate_update" data-id="{{$cate->id}}" method='post' action='{{ route('cates.update',['cate' => $cate]) }}'>
                                            @method('PATCH')
                                            @csrf
                                            <div class="error">
                                                @include('admin.error')
                                            </div>
                                            <div class='mb-3'>
                                                <label
                                                    class='form-label'
                                                    for='basic-default-fullname'
                                                >Title</label>
                                                <input
                                                    type='text'
                                                    class='form-control title'
                                                    id='title-edit-{{$cate->id}}'
                                                    placeholder='Input Title'
                                                    name='title'
                                                    value="{{$cate->title}}"
                                                />
                                            </div>
                                            <div class='mb-3'>
                                                <label
                                                    class='form-label'
                                                    for='basic-default-company'
                                                >Slug</label>
                                                <input
                                                    type='text'
                                                    class='form-control slug'
                                                    id='slug-edit-{{$cate->id}}'
                                                    placeholder='Input Slug'
                                                    name='slug'
                                                    value="{{$cate->slug}}"
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
                                                        value="{{$cate->desc}}"
                                                    />
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class='form-label'
                                                       for='basic-default-email'>Parent Id</label>
                                                <select name="parent_id" class="form-control" id="parent_id">
                                                    <option value="">Chọn danh mục cha</option>
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
                    </tbody>
                </table>
                <div class="pagination mt-4 pb-4">
                    {{ $cates->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

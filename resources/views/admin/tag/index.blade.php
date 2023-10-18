@extends('admin.main')
@section('contents')
    <div class="container-fluid flex-grow-1 container-p-y">
        <h3 class="fw-bold text-primary py-3 mb-4">{{$title}}</h3>
        <div class="card">
            <div class="d-flex p-4 justify-content-between">
                <h5 class=" fw-bold">Danh sách danh mục</h5>
                <button type="button" data-id="" class="btn btn-success text-dark px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#createTag">Thêm mới</button>
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
                                        id='title-store'
                                        placeholder='Input Title'
                                        name='title' data-require='Mời nhập Tiêu đề'
                                    />
                                </div>
                                <div class="form-group mb-3">
                                    <label class='form-label'
                                           for='basic-default-email'>Parent Id</label>
                                    <select name="parent_id" class="form-control" id="parent_id">
                                        <option value="">Chọn danh mục cha</option>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->id }}-{{ $tag->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class='form-label'
                                           for='basic-default-email'>Tag</label>
                                    <select name="tag" class="form-control" id="tag">
                                        <option value="">Chọn danh mục cha</option>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->id }}-{{ $tag->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class='form-label'
                                           for='basic-default-email'>Tag</label>
                                    <select name="tag" class="form-control" id="tag">
                                        <option value="">Chọn danh mục cha</option>
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

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Tag Name</th>
                        <th>Cate Id</th>
                        <th>Document Id</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($tags as $tag)
                        <tr data-id="{{$tag->id}}">
                            <td> {{ $loop->iteration }}</td>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->tag_name}}</td>
                            <td>{{$tag->cate_id}}</td>
                            <td>{{$tag->desc}}</td>
                            <td>
                            @foreach($tag_parents as $tag_parent)
                                @if($tag->parent_id == $tag_parent->id)
                                    {{$tag_parent->id}} - {{$tag_parent->title}}
                                @endif
                            @endforeach
                            </td>
                            <td>{{$tag->tag}}</td>
                            <td class="d-flex justify-content-between">
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
                                            class='form-control title input-field'
                                            id='title-edit-{{$tag->id}}'
                                            placeholder='Input Title'
                                            name='title' data-require='Mời nhập Tiêu đề'
                                            value="{{$tag->title}}"
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
                                            id='slug-edit-{{$tag->id}}'
                                            placeholder='Input Slug'
                                            name='slug' data-require='Mời nhập Slug'
                                            value="{{$tag->slug}}"
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
                                                value="{{$tag->desc}}"
                                            />
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class='form-label'
                                               for='basic-default-email'>Parent Id</label>
                                        <select name="parent_id" class="form-control" id="parent_id">
                                            <option value="">Chọn danh mục cha</option>
                                            @foreach($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->id }}-{{ $tag->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class='form-label'
                                               for='basic-default-email'>Tag</label>
                                        <select name="tag" class="form-control" id="tag">
                                            <option value="">Chọn danh mục cha</option>
                                            @foreach($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->id }}-{{ $tag->title }}</option>
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

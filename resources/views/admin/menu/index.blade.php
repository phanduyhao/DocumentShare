@extends('admin.main')
@section('contents')
    <div class="container-fluid flex-grow-1 container-p-y">
        <h3 class="fw-bold text-primary py-3 mb-4">{{$title}}</h3>
        <div class="card">
            <div class="d-flex p-4 justify-content-between">
                <h5 class=" fw-bold">Danh sách Menu</h5>
                <div class="">
                    <button type="button" data-id="" class="btn btn-success text-dark px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#createMenu">Thêm mới</button>
                    <button type="button"class="btn btn-danger me-2 px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#deleteModalAll">Xóa tất cả</button>
                    <div class="modal fade" id="deleteModalAll" tabindex="-1" aria-labelledby="deleteModalAllLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteModalLabel">Bạn có chắc chắn xóa tất cả bản ghi không ?</h1>
                                </div>
                                <form action="{{route('deleteAllCate')}}" method="post" class="modal-footer">
                                    @csrf
                                    <button class="delete-forever btn btn-danger fw-bolder">Xóa</button>
                                    <button type="button" class="btn btn-secondary fw-bolder" data-bs-dismiss="modal">Đóng</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="createMenu" tabindex="-1" aria-labelledby="createMenuLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="createMenuLabel">Thêm mới Menu.</h1>
                        </div>
                        <div class="card-body">
                            <div class="error">
                                @include('admin.error')
                            </div>
                            <form id="form_menu_store" class="form-create" method='POST' action='{{route('menus.store')}}'>
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
                                <div class='mb-3 d-flex justify-content-between'>
                                    <div class="">
                                        <label
                                            class='form-label'
                                            for='basic-default-email'
                                        >Active</label>
                                        <div class='input-group input-group-merge'>
                                            <input class="form-check-input" name="active" type="checkbox">
                                        </div>
                                    </div>
                                    <div class="">
                                        <label
                                            class='form-label'
                                            for='basic-default-email'
                                        >Level</label>
                                        <div class='input-group input-group-merge'>
                                            <input
                                                type='number'
                                                id='level'
                                                class='form-control'
                                                name='level'
                                            />
                                        </div>
                                    </div>
                                    <div class="">
                                        <label
                                            class='form-label'
                                            for='basic-default-email'
                                        >Order</label>
                                        <div class='input-group input-group-merge'>
                                            <input
                                                type='number'
                                                id='order'
                                                class='form-control'
                                                name='order'
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class='form-label'
                                           for='basic-default-email'>Parent Id</label>
                                    <select name="parent_id" class="form-control" id="parent_id">
                                        <option value="">Chọn Menu cha</option>
                                        @foreach($menus as $menu)
                                            <option value="{{ $menu->id }}">{{ $menu->id }}-{{ $menu->title }}</option>
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
                        <th>Slug</th>
                        <th>Desc</th>
                        <th>Parent_Id</th>
                        <th>Level</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($menus as $menu)
                        <tr data-id="{{$menu->id}}">
                            <td> {{ $loop->iteration }}</td>
                            <td>{{$menu->title}}</td>
                            <td>{{$menu->slug}}</td>
                            <td>{{$menu->desc}}</td>
                            <td>
                                @if($menu->parent_id == null)
                                    0
                                @else
                                    {{$menu->parent->title}}
                                @endif
                            </td>
                            <td>{{$menu->level}}</td>
                            <td>{{$menu->order}}</td>
                            <td>
                                @if($menu->active == true)
                                   <div class="d-flex align-items-center fw-bold">
                                       <p class="circle-active bg-success rounded-circle"></p>
                                       <p class="ms-2">Active</p>
                                   </div>
                                @else
                                    <div class="d-flex align-items-center fw-bold">
                                        <p class="circle-active bg-danger rounded-circle"></p>
                                        <p class="ms-2">Not Active</p>
                                    </div>
                                @endif
                            </td>
                            <td class="">
                                <button type="button" data-url="/admin/menus/{{$menu->id}}" data-id="{{$menu->id}}" class="btn btn-danger btnDeleteAsk me-2 px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>
                                <button type="button" data-id="{{$menu->id}}" class="btn btn-edit btn-info btnEditMenu text-dark px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#editMenu{{$menu->id}}">Sửa</button>
                            </td>
                            <!-- Modal Delete -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteModalLabel">Bạn có chắc chắn xóa bản ghi này vĩnh viễn không ?</h1>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="delete-forever btn btn-danger" data-id="{{ $menu->id }}">Xóa</button>
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
                @foreach($menus as $menu)
                    <div class="modal fade" id="editMenu{{$menu->id}}" tabindex="-1" aria-labelledby="editMenu{{$menu->id}}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="createMenuLabel">Chỉnh sửa Menu.</h1>
                                </div>
                                <div class="card-body">
                                    <div class="error">
                                        @include('admin.error')
                                    </div>
                                    <form class="form_menu_update form-edit" id="form_menu_update-{{$menu->id}}" data-id="{{$menu->id}}" method='post' action='{{ route('menus.update',['menu' => $menu]) }}'>
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
                                                id='title-edit-{{$menu->id}}'
                                                placeholder='Input Title'
                                                name='title' data-require='Mời nhập Tiêu đề'
                                                value="{{$menu->title}}"
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
                                                id='slug-edit-{{$menu->id}}'
                                                placeholder='Input Slug'
                                                name='slug' data-require='Mời nhập Slug'
                                                value="{{$menu->slug}}"
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
                                                    value="{{$menu->desc}}"
                                                />
                                            </div>
                                        </div>
                                        <div class='mb-3 d-flex justify-content-between'>
                                            <div class="">
                                                <label
                                                    class='form-label'
                                                    for='basic-default-email'
                                                >Active</label>
                                                <div class='input-group input-group-merge'>
                                                    @if($menu->active == true)
                                                        <input class="form-check-input" checked name="active" type="checkbox">
                                                    @else
                                                        <input class="form-check-input" name="active" type="checkbox">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="">
                                                <label
                                                    class='form-label'
                                                    for='basic-default-email'
                                                >Level</label>
                                                <div class='input-group input-group-merge'>
                                                    <input
                                                        type='number'
                                                        id='level'
                                                        class='form-control'
                                                        name='level'
                                                        value="{{$menu->level}}"
                                                    />
                                                </div>
                                            </div>
                                            <div class="">
                                                <label
                                                    class='form-label'
                                                    for='basic-default-email'
                                                >Order</label>
                                                <div class='input-group input-group-merge'>
                                                    <input
                                                        type='number'
                                                        id='order'
                                                        class='form-control'
                                                        name='order'
                                                        value="{{$menu->order}}"
                                                    />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class='form-label'
                                                   for='basic-default-email'>Parent Id</label>
                                            <select name="parent_id" class="form-control" id="parent_id">
                                                @if($menu->parent_id != null)
                                                    <option value="{{ $menu->parent->id }}">{{ $menu->parent->id }}-{{ $menu->parent->title }}</option>
                                                @else
                                                    <option value="">Chọn Menu cha</option>
                                                @endif
                                                @foreach($menus as $menu)
                                                    <option value="{{ $menu->id }}">{{ $menu->id }}-{{ $menu->title }}</option>
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
                    {{ $menus->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
